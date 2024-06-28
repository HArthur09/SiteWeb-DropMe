<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Récupère les données du formulaire
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Vérifie que les champs sont remplis
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "Veuillez remplir tous les champs.";
    exit;
  }

  // Vérifie le format de l'email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Adresse email invalide.";
    exit;
  }

  // Met en forme le message
  $message = "Nom : $name\n\nEmail : $email\n\nObjet : $subject\n\nMessage :\n$message";

  // Envoie l'email
  $to = "brandontapiba@gmail.com";
  $headers = "From: $email";

  if (mail($to, $subject, $message, $headers)) {
    echo "OK";
  } else {
    echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
  }
} else {
  echo "Une erreur est survenue. Veuillez réessayer plus tard.";
}
?>
