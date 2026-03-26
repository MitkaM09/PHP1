<?php 
include "Kniha.php";
include "Database.php";

$spojenie = new Database();
$db = $spojenie->nadviazSpojenie();


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
    
    $sql = "UPDATE knihy 
            SET nazov = :nazov, 
                autor = :autor, 
                rok_vydania = :rok_vydania, 
                stav = :stav
            WHERE id = :id";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        ":id" => $_POST["id"],
        ":nazov" => $_POST["nazov"],
        ":autor" => $_POST["autor"],
        ":rok_vydania" => $_POST["rok_vydania"],
        ":stav" => $_POST["stav"]
    ]);

    header("Location: index.php");
    exit(); 
}

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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-4">Update knihy</h2>

    <form method="post" class="p-3 border rounded bg-white">

        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= $kniha ? $kniha->getId() : '' ?>">

        <div class="mb-2">
            <label class="form-label">Názov</label>
            <input class="form-control" type="text" name="nazov" value="<?= $kniha ? $kniha->getNazov() : ''?>">
        </div>

        <div class="mb-2">
            <label class="form-label">Autor</label>
            <input class="form-control" type="text" name="autor" value="<?= $kniha ? $kniha->getAutor() : ''?>">
        </div>

        <div class="mb-2">
            <label class="form-label">Rok vydania</label>
            <input class="form-control" type="text" name="rok_vydania" value="<?= $kniha ? $kniha->getRok_vydania() : ''?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stav</label>
            <select class="form-select" name="stav">
                <option value="1" <?= ($kniha && $kniha->getStav() == 1)  ?>>Dostupná</option>
                <option value="0" <?= ($kniha && $kniha->getStav() == 0)  ?>>Požičaná</option>
            </select>
        </div>

        <button class="btn btn-success">Odoslať</button>

    </form>
</div>

</body>
</html>