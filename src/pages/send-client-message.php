<?php

if(isset($_POST['visitor_name'])) {
    $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
} 

if(isset($_POST['visitor_email'])) {
    $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
    $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
}

if(isset($_POST['visitor_phone'])) {
    $visitor_phone = preg_replace('/[^0-9]/', '', $_POST['visitor_phone']);
}
        
if(isset($_POST['visitor_message'])) {
    $visitor_message = htmlspecialchars($_POST['visitor_message']);
}

// $visitor_name = $_POST['visitor_name'];
// $visitor_email = $_POST['visitor_email'];
// $visitor_phone = $_POST['visitor_phone'];
// $visitor_message = $_POST['visitor_message'];

$formcontent="Inquiry from: Name: $visitor_name \n Email: $visitor_email \n Phone: $visitor_phone \n Message: $visitor_message";

$recipient = "alok@mechanismm.com";

$subject = "[MechanismM] Inquiry from $visitor_name";
$mailheader = "From: $visitor_name \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

?>

<div class="content-item bio-content-item">
  <div class="block row center--text--in--block">
    <div class="small-12 medium-12 large-10 columns medium-centered large-centered">
        <img 
        srcset="./assets/img/alok.jpg,
              ./assets/img/alok@2x.jpg 2x"
        src="./assets/img/alok@2x.jpg" class="profile-pic" alt="alok aaron jethanandani"> 
        <h1 class="tagline"><strong>Thank you for sending your message</strong></h1>
        <p class="bio--copy">I will reply within next 1-2 business days.</p>
        <a href="index.html" class="button">Go home</a>  

    </div>
  </div>
</div> 

<?php
/*  
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_phone = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }

    if(isset($_POST['visitor_phone'])) {
        $visitor_phone = preg_replace('/[^0-9]/', '', $_POST['visitor_phone']);
        $email_body .= "<div>
                           <label><b>Visitor Phone:</b></label>&nbsp;<span>".$visitor_phone."</span>
                        </div>";
    }
            
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Visitor Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    $recipient = "alok@mechanismm.com";
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_body, $headers)) {
        echo "<p>Inquiry from: 
            <ul>
                <li>$visitor_name</li>
                <li>$visitor_email</li>
                <li>$visitor_phone</li>
                <li>$visitor_message</li>
            </ul>
        </p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
*/

?>
