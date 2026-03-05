<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $cislo1 = $_POST["cislo1"];
    $cislo2 = $_POST["cislo2"];
    $operacia = $_POST["operacia"];

    if ($operacia === "+") {
        echo $cislo1 + $cislo2;
    } 
    else if ($operacia === "-") {
        echo $cislo1 - $cislo2;
    } 
    else if ($operacia === "*") {
        echo $cislo1 * $cislo2;
    } 
    else if ($operacia === "/") {
        if ($cislo2 == 0) {
            echo "Delenie nulou!";
        } else {
            echo $cislo1 / $cislo2;
        }
    }
}

/*$meno = "Janko";
$priezvisko = "Hraško"
$vek = 12;
echo"uživatel".$meno."".$priezvisko. "ma vek" .$vek. ".";*/









?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Kalkulačka</title>
</head>
<body>

<form method="post">
    <fieldset>

        <label>Číslo 1:</label><br>
        <input type="number" name="cislo1" class="form-control" required>
        <br>

        <label>Číslo 2:</label><br>
        <input type="number" name="cislo2" class="form-control" required>
        <br>

        <label>Operácia:</label><br>
        <select name="operacia" class="form-select" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br>

        <button type="submit" class="btn">Vypočítať</button>

    </fieldset>
</form>

</body>
</html>
