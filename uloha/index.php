<?php
$riadky = $_POST["riadky"] ;
$stlpce = $_POST["stlpce"] ;
$farba = $_POST["farba"] ;
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

        <label>Počet riadkov:</label><br>
        <input type="number" name="riadky" required>
        <br><br>

        <label>Počet stĺpcov:</label><br>
        <input type="number" name="stlpce" required>
        <br><br>

        <label>Farba:</label><br>
        <select name="farba" required>
            <option value="blue">Modrá</option>
            <option value="yellow">Žltá</option>
            <option value="red">Červená</option>
            <option value="green">Zelená</option>
        </select>
        <br><br>

        <button type="submit">Odoslať</button>

    </fieldset>
</form>

<?php

if ($riadky > 0 && $stlpce > 0) {

    echo "<table border='1'>";

    for ($a = 0; $a < $riadky; $a++) {
        echo "<tr>";

        for ($b = 0; $b < $stlpce; $b++) {

            if (($a + $b) % 2 == 0) {
                $bg = $farba;
            } else {
                $bg = "white";
            }

            echo "<td width='30px' height='30px' style='background-color:$bg'></td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>