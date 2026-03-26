<?php 

include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

if (!$db) {
    die("Databaza nie pripojena");
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "delete") {

    $stmtDelete = $db->prepare("DELETE FROM knihy WHERE id = :id");
    $stmtDelete->execute([
        ":id" => $_POST["kniha_id"]
    ]);

    header("Location: index.php");
    exit();
}

/*Vytvorenie*/


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "create") {

    $stmtCreate = $db->prepare("INSERT INTO knihy (nazov, autor, rok_vydania, stav)
                                VALUES (:nazov, :autor, :rok_vydania, :stav)");


if(empty($_POST["nazov"])||empty($_POST["autor"])||empty($_POST["rok_vydania"])){
    header("Location: index.php?error");
    exit();



}
    $success =$stmtCreate->execute([
        ":nazov" => $_POST["nazov"],
        ":autor" => $_POST["autor"],
        ":rok_vydania" => (int)$_POST["rok_vydania"],
        ":stav" => (int)$_POST["stav"]
    ]);

 

    if ($success) {
        header("Location: index.php?success");
        exit();
    } else {
        header("Location: index.php?error");
        exit();
    }




}

  $stav = ""; 

   

    if (isset($_GET["success"])) {
        $stav = "Super som na teba hrdý";} 
  elseif (isset($_GET["error"])) {
     $stav = "OJOJOJ niečo nejde";}



/*Vytvorenie*/

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {

    header("Location: update.php?id=" . $_POST["kniha_id"]);
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "info") {

    header("Location: info.php?id=" . $_POST["kniha_id"]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "switch") {

    $stmtSwitch = $db->prepare("UPDATE knihy 
                                SET stav = IF(stav = 1, 0, 1)
                                WHERE id = :id");

    $stmtSwitch->execute([
        ":id" => $_POST["id"]
    ]);

    header("Location: index.php");
    exit();
}


$stmtSelect = $db->query("SELECT * FROM knihy");

$kniznica = [];

while ($row = $stmtSelect->fetch(PDO::FETCH_ASSOC)) {
    $kniha = new Kniha(
        $row["nazov"],
        $row["autor"],
        (int)$row["rok_vydania"],
        (int)$row["stav"]
    );

    $kniha->setId($row["id"]);
    $kniznica[] = $kniha;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knižnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php if (isset($_GET["error"])): ?>
    <div class="alert alert-danger" >
        <h4 class="alert-heading"><?=$stav?></h4>
        
    </div>
    <?php endif; ?>

<?php if (isset($_GET["success"])): ?>
    <div class="alert alert-success" >
        <h4 class="alert-heading"><?=$stav?></h4>
        
    
    </div>
<?php endif; ?>



    <h1>Knižnica</h1>
    <br>

    <!-- CREATE -->
    <form class="create" action="index.php" method="post">
        <fieldset>
            <legend>Vloženie knihy</legend><br>

            <input type="hidden" name="action" value="create">

            <input type="text" name="nazov" placeholder="Názov" >
            <input type="text" name="autor" placeholder="Autor" >
            <input type="number" name="rok_vydania" placeholder="Rok vydania" >

            <select name="stav">
                <option value="1">Dostupná</option>
                <option value="0">Požičaná</option>
            </select>

            <button type="submit" class="btn btn-success">Pridať</button>
        </fieldset>
    </form>

    <table class="table table-bordered mt-4">
        <tr>
            <th>Názov</th>
            <th>Autor</th>
            <th>Rok vydania</th>
            <th>Stav</th>
            <th colspan="3">Akcie</th>
        </tr>

        <?php foreach ($kniznica as $kniha): ?>
        <tr>
            <td><?= $kniha->getNazov(); ?></td>
            <td><?= $kniha->getAutor(); ?></td>
            <td><?= $kniha->getRok_vydania(); ?></td>

            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $kniha->getId(); ?>">
                    <input type="hidden" name="action" value="switch">

                    <button type="submit" class="btn btn-secondary">
                        <?= $kniha->getStav() === 1 ? "Dostupná" : "Požičaná"; ?>
                    </button>
                </form>
            </td>

            <td>
                <form method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

            <td>
                <form method="POST">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </td>

            <td>
                <form method="POST">
                    <input type="hidden" name="action" value="info">
                    <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>">
                    <button type="submit" class="btn btn-warning">Info</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>