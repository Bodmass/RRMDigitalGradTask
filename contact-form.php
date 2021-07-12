<?php

$nameError = $lastNameError = $emailError = $teleError = $messageError = "";
$firstName = $lastName = $email = $tele = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firstName"])) {
        $nameError = "First Name is required";
    }
    else {
        $firstName = test_input($_POST["firstName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
          $nameError = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastName"])) {
        $lastNameError = "Last Name is required";
    }
    else {
        $lastName = test_input($_POST["lastName"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
          $lastNameError = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailError = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailError = "Invalid email format";
        }
      }

      if (empty($_POST["tele"])) {
        $teleError = "Telephone Number is required";
      } else {
        $tele = test_input($_POST["tele"]);
        preg_replace('/\D/', '', $tele);
      }

      
    
      if (empty($_POST["message"])) {
        $messageError = "The description can't be empty";
      }else {
        $message = $_POST['message'];
      }



    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $town = $_POST['town'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];

    $subject = 'Form Response from '.$firstName." ".$lastName;
    $mailTo = 'aziz@gourvid.tech';
    $headers = "From: ".$email;
    $txt = "You recieved a form submission. \n\nFirst Name: ".$firstName."\n\Last Name: ".$lastName.""."\n\Address: ".$address1." ".$address2." ".$town." ".$country." ".$postcode."\n\Message: ".$message;
    
    if($nameError == '' and $lastNameError == '' and $emailError == '' and $messageError == '' and $teleError == ''){
        mail($mailTo, $subject, $txt, $headers);
        echo "Hi $firstName, thank you for getting in contact. We will be in touch shortly.";
    }
    else{
        echo "Please correct the errors listed in the form!";
    }
    
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>