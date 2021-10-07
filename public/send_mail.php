<?php
    $post = (object)$_POST;
    if( !empty($post))
    {
        if( !empty( $post->email ) )
        {
            $to = $post->email;
            $subject = "Notify ". $post->email ." on web Resum";

            $message = "
            <html>
            <head>
            <title>Cosplay</title>
            </head>
            <body>
            <p> Hi, </p>
            <h2>This is and informal mail to tell you that this email '". $post->email."' ask for remindar when site resum.</h2>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            // $headers .= 'From: <info@cosplay-1exchange.com>' . "\r\n";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: Coolest guy" . "\r\n";
            ini_set("sendmail_from","webmaster@".$_SERVER["SERVER_NAME"]);
            if(mail($to,$subject,$message,$headers))
                die(json_encode(['status' => 'success', 'message' => 'email send ok']));
        }
    }
    die(json_encode(['status' => 'success', 'message' => 'email send no']));
?>    