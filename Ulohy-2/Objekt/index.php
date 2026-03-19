<?php 

include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie ->nadviazSpojenie();

if (!$db) {
    die("Databaza nie pripojena");
}

$sql = "SELECT * FROM knihy";

$stmt = $db->query($sql);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "delete"){

    $sql = "DELETE FROM knihy WHERE id = :id";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ":id" => $_POST["kniha_id"]
    ]);

    header("Location:index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "create"){

    $sql = "INSERT INTO knihy (nazov, autor, rok_vydania, stav)
            VALUES (:nazov, :autor, :rok_vydania, :stav)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ":nazov" => $_POST["nazov"],
        ":autor" => $_POST["autor"],
        ":rok_vydania" => $_POST["rok_vydania"],
        ":stav" => $_POST["stav"]
    ]);

    header("Location:index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update"){
    header("Location:update.php");
    exit();
}
$kniznica = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $kniha = null;

   $kniha = new Kniha($row["nazov"], $row["autor"],(int)$row["rok_vydania"],(int)$row["stav"]);

   if($kniha){
    $kniha->setId($row["id"]);
    $kniznica[] = $kniha;
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
</head>
<body>
    <h1>Knižnica</h1>
    <br>
    <table border ="1">
        
        <tr>
            <th>Nazov</th>
            <th>Autor</th>
            <th>Rok vydania</th>
            <th>Stav</th>
            <th>Action</th>
        </tr>

            <?php foreach ($kniznica as $kniha):?>
                <tr>
                  <td>
                    <?= $kniha->getNazov();?>
                </td>
                <td>
                    <?= $kniha->getAutor();?>
                </td>
                <td>
                    <?= $kniha->getRok_vydania();?>
                </td>
                <td>
                    <?= $kniha->getStav();?>
                </td>


                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="action" value="info">
                        <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>" >
                        <button type="submit" class="btn btn-outline-info"  >INFO</button>
                    </form>
                </td>
                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>" >
                        <button type="submit" class="btn btn-outline-warning"  >UPDATE</button>
                    </form>
                </td>
                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="kniha_id" value="<?= $kniha->getId(); ?>" >
                        <button type="submit" class="btn btn-outline-danger">DELETE</button>
                    </form>
                </td>
                
            </tr>
            <?php endforeach?>

                <h2>Pridanie do kniznice</h2>

                <form  action="index.php" method="POST" >
                    <input type="hidden" name="action" value="create">

                    <input type="text" name="nazov" placeholder="Názov" >
                    <input type="text" name="autor" placeholder="Autor" >
                    <input type="number" name="rok_vydania" placeholder="rok vydania" >
                    
                    <select name="stav">
                        <option value="1">Dostupná</option>
                        <option value="0">Požičaná</option>
                    </select>

                    <button type="submit" class="btn btn-outline-success " >ADD </button>
                </form>
    </table>





</body>
</html>