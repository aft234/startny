<?php

// Include the Autoloader
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if(isset($_POST['submit'])) {

    // Create error array
    // Errors we catch will be added to this array
    $error = array();

    // Get the variables from the form
    // $name = $_POST["name"];
    $email = $_POST["email"];
    $type = $_POST["type"];
    // $message = $_POST["message"];
    // $filename = $_POST["filename"];

    // Check to make sure a name was entered
    // if($name == ""){
    //     $error[] = "Please enter a name.";
    // }

    // Check to make sure the email is valid
    if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Please enter a valid email address.";
    }

    // If there are no errors, send the email
    // Else, output the errors and don't send the email
    if ( ! $error) {

        // Instantiate the client
        // You can create a free account and get your own API key here: http://www.mailgun.com/
        $mgClient = new Mailgun('Ykey-3wspm6cwsx2r8pq026l6svtswz4-ik25');
        $domain = "propthink.mailgun.org";

        // Make the call to the client to send email.
        $result = $mgClient->sendMessage("$domain",
                              array(
                                    'from'    => "$name <$email>",
                                    'to'      => 'anthony.tumbiolo@gmail.com',
                                    'subject' => "$type",
    } else {
        // Output any errors
        foreach ($error as $line) {
            echo "<p class='error'>$line</p>";
        }
    }
}

?>