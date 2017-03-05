<?php
 
if(isset($_POST['phone'])) {     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = 'notmylogin@gmail.com';
    //$site_email = 'ivanovsa@vk-zavod.com';
    $site_email = 'no-reply@'.$_SERVER['SERVER_NAME'];
    $email_subject = 'Регистрация с сайта '.$_SERVER['SERVER_NAME'];
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['phone'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['name']; // required
 
    $job = $_POST['job']; // not required    

    $organization = $_POST['organization']; // not required     
 
    $phone = $_POST['phone']; // not required   
 
    
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Заполнена форма регистрации на сайте.\n\n";
 
    function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
    }
  
    $email_message .= "Ф.И.О.: ".clean_string($first_name)."\n";
	$email_message .= "Организация: ".clean_string($organization)."\n";
    $email_message .= "Должность: ".clean_string($job)."\n";    
    $email_message .= "Телефон: ".clean_string($phone)."\n";
 

// create email headers
 
$headers = 'From: '.$site_email."\r\n".
 
'Reply-To: '.$site_email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>