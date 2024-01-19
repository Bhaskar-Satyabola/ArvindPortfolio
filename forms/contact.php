<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $contact = $_POST['contact'];

    // Validation
    if(empty($name) || empty($email) || empty($message)){
        echo "Please fill in all required fields.";
    } else {
        // Sanitize inputs
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $message = filter_var($message, FILTER_SANITIZE_STRING);
        $contact = filter_var($contact, FILTER_SANITIZE_STRING);

        $to = "bhaskarsatyabola.bs11@gmail.com";
        $subject = "New Message from Contact Form";
        $body = "Name: $name\nEmail: $email\nContact: $contact\nMessage: $message";
        
        // Send email
        if(mail($to, $subject, $body)){
            echo "Thank you for your message!";
        } else {
            echo "Error sending message. Please try again later.";
        }
    }
}
?>
