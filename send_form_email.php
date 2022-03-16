<?php
 
if(isset($_POST['email'])) {
 
 
    // Email address and subject line
    $email_to = "james@eegroupit.co.uk";
    $email_subject = "Website Contact";
 
 
    function died($error) {
 
        // error
 
        echo "There were error(s) found within the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please fix these errors to complete the form.<br /><br />";
 
        die();
 
    }
 
     
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        died('There appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $comments = $_POST['comments']; // required
 
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
 
// email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
<!-- success code part -->
<meta charset="utf-8"> 
<title>Thank You</title>
<link rel="stylesheet" href="main.css">

<section class="success-area">
  <div class="container">
    <h1 class="success-area__title text-center">Thank you</h1>

    <p class="text-center">
      Thank you for contacting us, we will be in touch shortly.
    </p>

    <p class="text-center" style="margin-top: 20px;">
      <a href="index.html" class="success-area__link">
        Back to homepage
      </a>
    </p>
  </div>
</section>
 
<?php
 
}
 
?>