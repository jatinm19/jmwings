<?php

$activationcode=rand();
$headers="";
$ms="";
						$_SESSION['token']=$activationcode;
						$c='faiz';
						$d='mohddfaizz7862@gmail.com';
						$to=$d;
						$msg= "Thanks for new Registration.";
						$subject="Email verification (happystring.co.in)";
						$headers .= "MIME-Version: 1.0"."\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
						$headers .= 'From:Happy String'."\r\n";
						$ms.="<html></body><div><div>Dear $c,</div></br></br>";
						$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
						<div style='padding-top:10px;'><a href='http://www.happystring.co.in/verification.php?code=$activationcode'>Click Here</a></div>
						<div style='padding-top:4px;'>Powered by <a href='happystring.co.in'>happystring.co.in</a></div></div>
						</body></html>";
						
						if(mail($to,$subject,$ms,$headers))
{

//echo "The email was sent.fdfdf";
	echo "message send";
	exit;
  
}
else 
{
  echo "There was an error sending the mail.";
}
						?>
						
						$message=" 
<a href='http://www.happystring.co.in/verification.php?code=$activationcode'>Click Here</a> $eol 
Powered by <a href='happystring.co.in'>happystring.co.in</a>";