<?php

$nameError = $lastNameError = $emailError = $teleError = $messageError = $uploadError = "";
$firstName = $lastName = $email = $tele = $message = $uploadedFile = "";
$submitDisabled = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  
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
        if(!preg_match("/^\+[-0-9]{6,20}$/", $tele)){
          $teleError = "Invalid Format. Start with +areacode";
        }
      }
    
      if (empty($_POST["message"])) {
        $messageError = "The description can't be empty";
      }else {
        $message = $_POST['message'];
      }

      if($uploadError > 0)
      {
          die('Upload error or No files uploaded');
      }

    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $town = $_POST['town'];
    $county = $_POST['county'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $fullAddress = '';

    if(!empty($_FILES["upload"]["name"])){
                
      // File path config
      $targetDir = "tmp/";
      $fileName = basename($_FILES["upload"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      
      // Allow certain file formats
      $allowTypes = array('pdf', 'doc', 'docx');
      if(in_array($fileType, $allowTypes)){
          // Upload file to the server
          if(move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath)){
              $uploadedFile = $targetFilePath;
          }else{
              $uploadStatus = 0;
              $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
          $uploadStatus = 0;
          $statusMsg = 'Sorry, only PDF, DOC and DOCX files are allowed to upload.';
      }
    }

    if(!empty($address1))
    {
      $fullAddress .= $address1."<br>";
    }
    if(!empty($address2))
    {
      $fullAddress .= $address2."<br>";
    }
    if(!empty($town))
    {
      $fullAddress .= $town."<br>";
    }
    if(!empty($county))
    {
      $fullAddress .= $county."<br>";
    }
    if(!empty($postcode))
    {
      $fullAddress .= $postcode."<br>";
    }
    if(!empty($country))
    {
      $fullAddress .= $country."<br>";
    }

    $subject = 'Form Response from '.$firstName." ".$lastName;
    $mailTo = 'aziz@gourvid.tech';
    $headers = "From: ".$email;
    $txt = "You recieved a form submission. \n\nFirst Name: ".$firstName."\n\Last Name: ".$lastName.""."\n\Address: ".$address1." ".$address2." ".$town." ".$county." ".$postcode." ".$country."\n\Message: ".$message;

    $htmlContent = '<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-baqh{text-align:center;vertical-align:top}
    .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
    .tg .tg-0lax{text-align:left;vertical-align:top}
    </style>
    <h3 align="center">Form Submission</h3>
    <table class="tg" style="undefined;table-layout: fixed; width: 489px">
    <colgroup>
    <col style="width: 186px">
    <col style="width: 303px">
    </colgroup>
    <thead>
      <tr>
        <th class="tg-0pky">First Name</th>
        <th class="tg-0pky">'.$firstName.'</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="tg-0lax">Last Name</td>
        <td class="tg-0lax">'.$lastName.'</td>
      </tr>
      <tr>
        <td class="tg-0lax">Email Address</td>
        <td class="tg-0lax">'.$email.'</td>
      </tr>
      <tr>
        <td class="tg-0lax">Telephone Number</td>
        <td class="tg-0lax">'.$tele.'</td>
      </tr>
      <tr>
        <td class="tg-0lax">Address</td>
        <td class="tg-0lax">'.$fullAddress.'</td>
      </tr>
      <tr>
        <td class="tg-baqh" colspan="2">Message</td>
      </tr>
      <tr>
        <td class="tg-0lax" colspan="2">'.$message.'</td>
      </tr>
    </tbody>
    </table>';

    $semiRand = md5(time());
    $mimeBoundary = "==Multipart_Boundary_x{$semiRand}x";
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mimeBoundary}\""; 
    $txt = "--{$mimeBoundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

    if(is_file($uploadedFile)){
      $txt .= "--{$mimeBoundary}\n";
      $fp =    @fopen($uploadedFile,"rb");
      $data =  @fread($fp,filesize($uploadedFile));
      @fclose($fp);
      $data = chunk_split∂(base64_encode($data));
      $txt .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
      "Content-Description: ".basename($uploadedFile)."\n" .
      "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
      "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
  
    $txt .= "--{$mimeBoundary}--"; 
    $returnpath = "-f" . $email; 

    if($nameError == '' and $lastNameError == '' and $emailError == '' and $messageError == '' and $teleError == ''){
        mail($mailTo, $subject, $txt, $headers, $returnpath);
        @unlink($uploadedFile);
        $submitSuccess = "Hi $firstName, thank you for getting in contact. We will be in touch shortly.";
        $submitDisabled = true;
    }
    else{
      $submitError = "Please correct the errors listed in the form!";
    }
    
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>