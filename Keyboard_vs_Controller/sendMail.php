<?php

require_once "vendor/autoload.php";

function sendMail($username, $email, $metaData)
{
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('melki.irfa.sendmail@gmail.com')
        ->setPassword('tWOMEk6%9VgP');
    $mailer = new Swift_Mailer($transport);
    $metaData["fromEmail"] = "melki.irfa.sendmail@gmail.com";
    $message = (new Swift_Message($metaData['subject']))
        ->setFrom([$metaData['fromEmail'] => $metaData['fromName']])
        ->addTo($email)
        ->setBody($metaData['message']);
    if ($mailer->send($message)) {
        return $metaData['success'];
    } else {
        return $metaData['error'];
    }
}
