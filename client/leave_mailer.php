<?php
require_once "Mail.php";
function mailer($recipient,$msg,$uname){
$from = '<leavemanageproj@gmail.com>';
$to = '<'.$recipient.'>';
$user = $uname;
$subject = 'Requested Leave by '.$user;
$body = $msg;
$status = false; // initially set to false
$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'your_user_name@domain.com',
        'password' => 'your_password'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    $status = false;
} else {
    $status = true; // return true on succesful sending
}
return $status;
}
?>
