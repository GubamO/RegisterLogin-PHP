<?php

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Vérification de la longueur du mot de passe
if (strlen($password) < 8) {
    die("Le mot de passe doit contenir au moins 8 caractères");
  }
  
  // Vérification de la présence de chiffres et de lettres majuscules dans le mot de passe
  if (!preg_match('/[0-9]/', $password) || !preg_match('/[A-Z]/', $password)) {
    die("Le mot de passe doit contenir au moins un chiffre et une lettre majuscule");
  }

  // Chiffrement du mot de passe
$password = password_hash($password, PASSWORD_DEFAULT);


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

// Préparation de la requête SQL pour vérifier les données d'utilisateur dans la base de données
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

// Exécution de la requête
$result = mysqli_query($conn, $query);

// Vérification des résultats
if (mysqli_num_rows($result) > 0) {
  // Si les données sont correctes, on affiche un message de succès
  echo "Connexion réussie!";
} else {
  // Si les données sont incorrectes, on affiche un message d'erreur
  echo "Erreur: nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>
