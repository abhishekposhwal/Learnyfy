<?php
include 'config.php';
    $name = $_POST["name"];
    $email= $_POST["email"];
    $message= $_POST["message"];
    $subject= $_POST["subject"];
    $query="INSERT INTO tbl_contact(name,email,subject,message,date,time) VALUES('$name','$email','$subject','$message',curdate(),curtime())";
    mysqli_query($connect,$query);
    echo '1';
?>
