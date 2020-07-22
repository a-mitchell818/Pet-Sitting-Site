<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>"Bookit "</title>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
        <link href="css/cover.css" type="text/css" rel="stylesheet"/>
        <link href="css/mystyle.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "amitch41";
        $password = "WhileThat66";
        $dbname = "amitch41";


        try {
            $conn = new
                PDO("mysql:host=$servername;dbname=amitch41",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


            $flname = $_POST["flname"];
            $pname = $_POST["pname"];
            $tel = $_POST["tel"];
            $email = $_POST["email"];
            $sdate = $_POST["sdate"];
            $edate = $_POST["edate"];
            $promo = $_POST["promo"];
            $comments = $_POST["comments"];

            $sql = "insert into BookingRequest values ('$flname','$pname','$tel','$email','$sdate','$edate','$promo','$comments');";

            $to = "licia_peach1989@hotmail.com";
            $subject = "Contact Us Message";
            $headers = "From : " . $email;
            $body = "This is the body of the email.\n\n";
            $body .= "The name is: ".$flname."\n"; 
            $body .= "The pets name is: ".$pname."\n";
            $body .= "The phone number is: ".$tel."\n";
            $body .= "The email is: ".$email."\n";
            $body .= "The visit start date is: ".$sdate."\n";
            $body .= "The visit end date: ".$edate."\n";
            $body .= "The promo code used is: ".$promo."\n";
            $body .= "The message is: ".$comments."\n";
            $body .= "This is the end of the message";

            if( mail($to, $subject, $body, $headers)){
                echo "E-Mail Sent successfully, we will get back to you soon.";
            }
            else
            {
                echo "Your Mail is not sent. Try Again."; 
            }
         /*   $message = 'This is a email message.';

            echo "<SCRIPT> alert('$message'); </SCRIPT>";*/

            // use exec() because no results are returneed
            $conn->exec($sql);
            echo "New record created successfully";
            header('Location: confirmation.php');
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;


        ?>

    </body>    
</html>