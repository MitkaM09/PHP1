<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <fieldset >
          
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Čisielko-1:</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="">
          </div>
          <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Čisielko-2:</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="">
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Operacia:</label>
            <select id="disabledSelect" class="form-select">
            <option></option>
              <option>+</option>
              <option>-</option>
              <option>*</option>
              <option>/</option>
            </select>
          </div>
          
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Odoslanie</button>
        </fieldset>
      </form>
</body>
</html>

---------------------------------------------------------------------------------
$riadky = $_POST["riadky"] ;
$stlpce = $_POST["stlpce"] ;

if ($riadky > 0 && $stlpce > 0) {

    echo "<table border='1'>";

    for ($a = 0; $a < $riadky; $a++) {
        echo "<tr>";
        for ($b = 0; $b < $stlpce; $b++) {
            echo "<td>☻</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}


<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Kalkulačka</title>
</head>
<body>

<form method="post">
    <fieldset>

        <label>Počet-riadkov:</label><br>
        <input type="riadky" name="riadky" >
        <br>

        <label>Počet-stlpcov:</label><br>
        <input type="stlpce" name="stlpce" >
        <br>

        <br>

        <button type="submit" >Odoslannie</button>

    </fieldset>
</form>

</body>
</html>
---------------------------------------------------------------------
<?php
$riadky = $_POST["riadky"] ?? 0;
$stlpce = $_POST["stlpce"] ?? 0;
$farba = $_POST["farba"] ?? "";
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

    echo "<table border='1' cellpadding='10' cellspacing='0'>";

    for ($a = 0; $a < $riadky; $a++) {
        echo "<tr>";

        for ($b = 0; $b < $stlpce; $b++) {

            
            if (($a + $b) % 2 == 0) {
                $bg = $farba;
            } else {
                $bg = "white";
            }

            echo "<td style='background-color:$bg'>✖</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
