<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("info.brytetech@gmail.com", "Bright Bediako");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() ."\n";
                return false;
            }
        }
    }
?>