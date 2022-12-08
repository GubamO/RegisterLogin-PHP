<?php

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Connexion à la base de données
$host = "localhost";
$user = "database_user";
$password = "database_password";
$database = "database_name";

$conn = mysqli_connect($host, $user, $password, $database);

// Vérification de la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Préparation de la requête SQL pour insérer les données dans la base de données
$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

// Exécution de la requête
if (mysqli_query($conn, $query)) {
  echo "Inscription réussie!";
} else {
  echo "Error: ";
}
