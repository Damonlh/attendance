<?php
 require 'vendor/autoload.php';

 class sendEmail{
     public static function sendMail($to, $subject, $content){
        $key = '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';

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("myorderrecipt@gmail.com", "Damon Hobbs");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $content);
        //$email->addContent("text/html", $content);

        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;
        }catch(Exception $e){
            echo 'Email exception Caught : '. $e->getMessage() . "\n";
            return false;
        }
     }
 }
?>