<?php
  $filename = "countries.txt";
  $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
  $options = '';
  $address1 = '';
  $address2 = '';
  $town = '';
  $county = '';
  $postcode = '';
  $select = '<select class="textForm" name="country" id="value">';
  if(!$_POST['country'] == ''){
    $options = "<option>{$_POST['country']}</option>";
  }
  foreach ($eachlines as $lines) {
    $options .= "<option>{$lines}</option>";
  }
  $select .= $options . "</select>";
  ?>
<?php include "contact-form.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us Form : Aziz Arar
    </title>
    <link rel="stylesheet" href="assets/css/style.css"
  </head>
  <body>
    <form class="contactForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
      <div class="contactFormContainer">
        <div class="contactFormGroup">
          <div class="contactField">
            <label class="contactLabel">
              First Name*
              <span class="error">
                <?php echo $nameError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="firstName" value="<?php echo $firstName; ?>"/>
          </div>
          <div class="contactField">
            <label class="contactLabel">
              Last Name*
              <span class="error">
                <?php echo $lastNameError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="lastName" value="<?php echo $lastName; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div class="contactField">
            <label class="contactLabel">
              Email Address*
              <span class="error">
                <?php echo $emailError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="email" value="<?php echo $email; ?>"/>
          </div>
          <div class="contactField">
            <label class="contactLabel">
              Telephone Number*
              <span class="error">
                <?php echo $teleError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="tele" value="<?php echo $tele; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div class="contactField">
            <label class="contactLabel">Address 1</label>
            <input class="textForm" type="text" name="address1" value="<?php echo $address1; ?>"/>
          </div>
          <div class="contactField">
            <label class="contactLabel">Address 2</label>
            <input class="textForm" type="text" name="address2" value="<?php echo $address2; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div class="contactField">
            <label class="contactLabel">Town</label>
            <input class="textForm" type="text" name="town" value="<?php echo $town; ?>"/>
          </div>
          <div class="contactField">
            <label class="contactLabel">County</label>
            <input class="textForm" type="text" name="county" value="<?php echo $county; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div class="contactField">
            <label class="contactLabel">Postcode</label>
            <input class="textForm" type="text" name="postcode" value="<?php echo $postcode; ?>"/>
          </div>
          <div class="contactField">
            <label class="contactLabel">Country</label>
            <?php echo $select; ?>
          </div>
        </div>
        <label class="contactLabel">
          Description*
          <span class="error">
            <?php echo $messageError; ?>
          </span>
        </label>
        <textarea class="textArea" name="message"><?php echo $message; ?></textarea>
        <label class="contactLabel">Your C.V</label>
        <div class="fileSelector">
          Select a file
          <input class="uploadField" type="file" name="cvupload" accept=".pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
        </div>
        <button class="submitButton" type="submit" name="submitBTN">
          SUBMIT
        </button>
        <?php echo $submitSuccess; ?>
        <?php echo $submitError; ?>
      </div>
    </form>
  </body>
</html>
