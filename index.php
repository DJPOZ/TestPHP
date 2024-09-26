<?php
// Connexion à la base de données
$servername = "sql300.infinityfree.com";
$username = "if0_37389633";
$password = "n0dHoAdw7Dhw";
$dbname = "if0_37389633_STI2D";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données des élèves
$sql = "SELECT * FROM eleves";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Ajouter un élève</h2>
    <form action="add_student.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <label for="genre">Genre:</label>
        <select id="genre" name="genre" required>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select>
        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des élèves</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Genre</th>
                <th>Date de Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                    echo "<td>" . $row["genre"] . "</td>";
                    echo "<td>" . $row["date_naissance"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucun élève trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>