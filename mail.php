<?php

// Include the Autoloader
require 'vendor/autoload.php';
use Mailgun\Mailgun;


$error = array();

$email = "";
$type = "";

$email = $_POST["email"];
$type = $_POST["type"];

echo $email;
echo $type;

if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Please enter a valid email address.";
    }


if ( ! $error) {

    // Instantiate the client
    // You can create a free account and get your own API key here: http://www.mailgun.com/
    // $mgClient = new Mailgun('key-3ax6xnjp29jd6fds4gc373sgvjxteol0');
    // $domain = "sandbox45522.mailgun.org";

    // Make the call to the client to send email.
    // $result = $mgClient->sendMessage("$domain",
    //                       array(
    //                             'from'    => "$email",
    //                             'to'      => 'start@startny.co',
    //                             'subject' => "$type",
    //                             ));
    mail("anthony.tumbiolo@gmail.com", "Email Subject", $type, "From: $email" );
} else {
    // Output any errors
    foreach ($error as $line) {
        echo "<p class='error'>$line</p>";
    }
}

?>