<?php 
$to = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mailsent= mail($to,$subject,$message);
if ($mailsent) {
    $data["success"] = true;
    $data["message"] = "Your message has been sent successfully";
}
else {
    $data["success"] = false;
    $data["message"] = "Your message has not been sent";
}

?>