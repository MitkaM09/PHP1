
<?php
$meno = $_POST["Meno"]  ;
$heslo = $_POST["Heslo"]  ;


if (strlen($heslo) >= 5) { 
    if ($heslo == "nbv123") {
        echo "<h2>Vitaj Admin   </h2>";
    } else {
        echo "<h2>Nesprávne heslo</h2>";
    }
} else {
    echo "<h2>Heslo musí mať minimálne 5 znakov</h2>";
}

?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prihlásenie</title>
</head>
<body>


<form method="post">
    <fieldset>
    <legend><h2>Login</h2></legend>
    <label>Meno:</label><br>
    <input type="text" name="Meno" ><br><br>

    <label>Heslo:</label><br>
    <input type="text" name="Heslo" required><br><br>

    <input type="submit" value="Prihlás sa">

        

    </fieldset>
</form>
</body>
</html>
