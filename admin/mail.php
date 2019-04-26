<?php
 
include 'functions/init.php';
// mail function
// function send_email($email,$subject,$msg,$header)
// {
// 	return mail($email,$subject,$msg,$header);
// }


$email=$_POST['mail'];
$sql="SELECT * FROM admin WHERE email='$email'";
$result=query($sql);
if (mysqli_fetch_array($result)) {
	$v_code=$_POST['v_original_code'];
	$_SESSION['or_code']=$v_code;
	$_SESSION['email']=$email;

	$subject="Password Reset Verification Code from Online Shopping System";

	$message="Here is your password reset code {$v_code}";
	$headers="From: Online Shopping System";

	if (send_email($email,$subject,$message,$headers)) {
	$_SESSION['send']=true;
	echo "<script>alert('Check your mail for verification code'); window.location='forget_pass.php'</script>";
	 }
	 else
	 {
	 	echo "not";
	 }
}
else
{
	echo "<script>alert('Your Entered Email address is not valid'); window.location='forget_pass.php'</script>";
}


?> 