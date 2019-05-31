<?php

  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];


/*Message Received From Website*/
$email_from = 'bouncebackphysiowebsite@mail.com';
$email_subject = "New Form submission";
$email_body = "You have received a new message from $name.\n".
            "Here is the message:\n $message".
 
/*Send Function*/
$to = "bouncebackphysiotherapy@mail.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);

/*Preventing Spam*/            
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))

{
echo "Bad email value!";
exit;
}
            
?>
