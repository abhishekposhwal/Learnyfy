<?php
include '../config.php';
    $to = 'demo@site.com';
    $name = $_POST["name"];
    $email= $_POST["email"];
    $text= $_POST["replymessage"];
    $subject= $_POST["subject"];


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$name.'  '.$subject.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$subject.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {  
        // $query="INSERT INTO tbl_contact(name,email,subject,message,date,time) VALUES('$name','$email','$subject','$text',curdate(),curtime())";
        // mysqli_query($connect,$query);
        header("location:newsletter.php?msg=1");
    }else{
       header("location:newsletter.php?msg=0");     
    }

?>
