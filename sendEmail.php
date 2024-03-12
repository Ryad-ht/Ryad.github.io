<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Destination de l'e-mail
    $to = 'hadjtahar.ryad@gmail.com';
    $subject = "Nouveau message de $name";
    $email_content = "Nom: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Téléphone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // En-têtes de l'e-mail
    $email_headers = "From: $name <$email>";

    // Envoyer l'e-mail
    if(mail($to, $subject, $email_content, $email_headers)) {
        // L'email a bien été envoyé
        // Vous pouvez rediriger vers une nouvelle page ou afficher un message de succès
        echo "<p>Merci pour votre message, $name. Nous vous contacterons bientôt.</p>";
    } else {
        // L'e-mail n'a pas pu être envoyé.
        echo '<p>Désolé, il y a eu une erreur lors de l\'envoi de votre message. Veuillez réessayer plus tard.</p>';
    }
} else {
    // Non POST request, afficher un message d'erreur ou autre
    echo '<p>Ce formulaire est destiné à être utilisé avec une requête POST.</p>';
}
?>
