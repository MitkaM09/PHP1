<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Meno = trim($_POST["Meno"]);
    $Heslo = trim($_POST["Heslo"]);
    $Pohlavie = trim($_POST["Pohlavie"]);
    $Vek = trim($_POST["Vek"]);

    file_put_contents("data.txt", "\n", FILE_APPEND);
    file_put_contents("data.txt", $Meno . "\n", FILE_APPEND);
    file_put_contents("data.txt", $Heslo . "\n", FILE_APPEND);
    file_put_contents("data.txt", $Pohlavie . "\n", FILE_APPEND);
    file_put_contents("data.txt", $Vek . "\n", FILE_APPEND);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prihlásenie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .form-box {
            background: tan ;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
    </style>
</head>
<body>

<div class="form-box">
    <form method="post">
        <fieldset>
            <legend class="text-center mb-4"><h2>Login</h2></legend>

            <div class="mb-3">
                <label class="form-label">Meno:</label>
                <input type="text" name="Meno" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Heslo:</label>
                <input type="password" name="Heslo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pohlavie:</label>
                <select name="Pohlavie" class="form-select" required>
                    <option value="Muž">Muž</option>
                    <option value="Žena">Žena</option>
                    <option value="Neregistrujem sa">Neregistrujem sa</option>
                    <option value="Zviera">Zviera</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Vek:</label>
                <input type="number" name="Vek" class="form-control" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Confirm identity</button>
                <a href="vypis.php" class="btn btn-secondary">Používatelia</a>
            </div>

        </fieldset>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
