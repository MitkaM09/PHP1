<?php

$obsah = file_get_contents("data.txt");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prihlásenie</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .content-box {
            background: tan;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>

<div class="content-box">
    <h2>Uložené údaje:</h2>
    <pre><?php echo $obsah; ?></pre>

    <a href="index.php" class="btn btn-primary mt-3">Login</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
