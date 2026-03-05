<?php
$nazov = $_POST["nazov"] ?? "";
$zaner = $_POST["zaner"] ?? "";

$pole = [
    "Rambo1"=>["zaner"=>"akčné","hlavná postava"=>"Silvester Stalone","rok"=>1982],
    "Matrix"=>["zaner"=>"sci-fi","hlavná postava"=>"Keanu Reeves","rok"=>1999],
    "Titanic"=>["zaner"=>"drama","hlavná postava"=>"Leonardo DiCaprio","rok"=>1997],
    "Forrest Gump"=>["zaner"=>"drama","hlavná postava"=>"Tom Hanks","rok"=>1994],
    "Iron Man"=>["zaner"=>"akčné","hlavná postava"=>"Robert Downey Jr.","rok"=>2008],
];
?>



<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Film</title>
    <style>
body {
    background-color: #f2f2f2;
    color: #222;
    font-family: Arial, sans-serif;
}

b {
    color: #1a73e8;  
}

hr {
    border: 1px solid #ccc;
}

button {
    background-color: #1a73e8;
    color: white;
    border: 1px black;
    padding: 6px 12px;
}
button:hover{background: color: #3366ff;}
fieldset {
    background-color:#0099ff;
}
</style>
</head>
<form method="post">
    <fieldset>

        <h4>Názov filmu:</h4>
        <input type="text" name="nazov">

        <h4>Žáner:</h4>
        <input type="radio" name="zaner" value="akčné"> Akčné<br>
        <input type="radio" name="zaner" value="drama"> Drama<br>
        <input type="radio" name="zaner" value="sci-fi"> Sci-fi<br>

        <button type="submit">Odoslanie</button>

    </fieldset>
</form>

</body>
</html>





<?php

foreach ($pole as $nazovFilmu => $value) {

    if ($zaner == $value["zaner"] && $nazov == $nazovFilmu) {
        echo "<hr>";
        echo "<b>$nazovFilmu</b><br>";
        echo "Žáner: " . $value["zaner"] . "<br>";
        echo "Hlavná postava: " . $value["hlavná postava"] . "<br>";
        echo "Rok: " . $value["rok"] . "<br>";
       
   
        
    }

}

?>


    




