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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échouée : " . $conn->connect_error);
}

if (isset($_POST['code'])) {
    $code = (int)$_POST['code'];

    if ($code == 0) {
        $sql = "SELECT code, article FROM articles";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            echo "<h3>Liste de tous les articles :</h3>";
            while ($row = $result->fetch_assoc()) {
                echo "Code : " . $row['code'] . " - Article : " . $row['article'] . "<br>";
            }
        }
    } elseif ($code >= 1 && $code <= 999) {
        $sql = "SELECT article FROM articles WHERE code = $code";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Le code " . $code . " est correct. L'information correspondante est : " . $row['article'] . ".<br>";
        } else {
            echo "Aucun article ne correspond à ce code.<br>";
        }
    } else {
        echo "Le code est incorrect, trop grand !<br>";
    }
}

$conn->close();
?>