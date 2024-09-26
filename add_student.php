<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_eleves";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$genre = $_POST['genre'];
$date_naissance = $_POST['date_naissance'];

// Insérer les données dans la base de données
$sql = "INSERT INTO eleves (nom, prenom, genre, date_naissance) VALUES ('$nom', '$prenom', '$genre', '$date_naissance')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel élève ajouté avec succès";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Rediriger vers la page d'accueil
header("Location: index.php");
exit;
?>
