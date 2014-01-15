<?php

if (!$_POST["email"] || !$_POST["type"]) {
    ?>{"ok":-1}<?php

} else {

$msg = "Someone entered their email address. It is " . $_POST["email"] . ". They requested an event of " . $_POST["type"] . ".\n\nDO NOT REPLY TO THIS EMAIL. The mailbox is never checked.";

error_log("----------SENDING EMAIL----------");
error_log($msg);

$fields = array(
    "from" => "josh@m.byjakt.com",
    "to" => "start@startny.co",
    "subject" => $_POST["type"] . " -- StartNY Email",
    "text" => $msg
);

$options = array(
    CURLOPT_URL => "https://api.mailgun.net/v2/m.byjakt.com/messages",
    CURLOPT_HEADER => false,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $fields,
    CURLOPT_RETURNTRANSFER => true
);
$auth = "api:key-1o403u2-vbcp5cy310omj5-mq3vfe3t6";
$auth_64 = base64_encode($auth);
$headers = array(
    'Authorization: Basic ' . $auth_64,
);
$ch = curl_init();
curl_setopt_array($ch, $options);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res = curl_exec($ch);

error_log("----------RESPONSE----------");
error_log(json_encode($res));
error_log("----------RESPONSE----------");

if ($res) {
    ?>{"ok":1}<?php
} else {
    ?>{"ok":0}<?php
}
}