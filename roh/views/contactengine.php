<?php
/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 5/20/14
 * Time: 12:25 PM
 */
$EmailTo = "info@regionofhoops.com";
$Subject = "Email from " . $Name;
$Name = Trim(stripslashes($_POST['Name']));
$Email = Trim(stripslashes($_POST['Email']));
$Message = Trim(stripslashes($_POST['Message']));
$EmailFrom = $Email;

// validation
$validationOK=true;
if (!$validationOK) {
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
    exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
if ($success){
    print "<meta http-equiv=\"refresh\" content=\"0;URL=../views/contactsuccess.html\">";
}
else{
    print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}