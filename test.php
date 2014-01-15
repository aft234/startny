<?php

echo "hello";

// Include the Autoloader
require 'vendor/autoload.php';
use Mailgun\Mailgun;


$error = array();

$email = $_POST["email"];
$type = $_POST["type"];

if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Please enter a valid email address.";
    }


if ( ! $error) {

    // Instantiate the client
    // You can create a free account and get your own API key here: http://www.mailgun.com/
    $mgClient = new Mailgun('Ykey-3wspm6cwsx2r8pq026l6svtswz4-ik25');
    $domain = "propthink.mailgun.org";

    // Make the call to the client to send email.
    $result = $mgClient->sendMessage("$domain",
                          array(
                                'from'    => "$email",
                                'to'      => 'anthony.tumbiolo@gmail.com',
                                'subject' => "$type",
                                ));
} else {
    // Output any errors
    foreach ($error as $line) {
        echo "<p class='error'>$line</p>";
    }
}

echo "Test";

?>