<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
</head>
<body>
    <form action="" method="POST">
        <label for="code">Entrez le code :</label>
        <input type="number" id="code" name="code" required>
        <button type="submit">Valider</button>
    </form>
</body>
</html>

<?php
if (isset($_POST['code'])) {
    $code = (int)$_POST['code'];

    if ($code >= 1 && $code <= 999) {
        echo "Le code " . $code . " est correct.<br>";
    } else {
        echo "Le code est incorrect, trop grand !<br>";
    }
}
?>