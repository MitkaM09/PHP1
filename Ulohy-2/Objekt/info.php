

<?php
include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();

$kniha = null;

if (isset($_GET["id"])) {
    $stmt = $db->prepare("SELECT * FROM knihy WHERE id = :id");
    $stmt->execute([":id" => $_GET["id"]]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $kniha = new Kniha($row["nazov"], $row["autor"], $row["rok_vydania"], $row["stav"]);
        $kniha->setId($row["id"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "spat") {
     
    header("Location: index.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="mb-4">Informácie ku knihe:</h1>

    <div class="  bg-white">
        <div><b>Názov:</b> <?= $kniha ? $kniha->getNazov() : ''?></div>
        <div><b>Autor:</b> <?= $kniha ? $kniha->getAutor() : ''?></div>
        <div><b>Rok vydania:</b> <?= $kniha ? $kniha->getRok_vydania() : ''?></div>
        <div>
            <b>Stav:</b> 
            <?= $kniha ? ($kniha->getStav() === 1 ? "Dostupná" : "Požičaná") : '' ?>
        </div>

        <form method="post" class="mt-3">
            <input type="hidden" name="action" value="spat">
            <button class="btn btn-success">Späť</button>
        </form>
    </div>
</div>

</body>
</html>