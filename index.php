<?php
  $filename = "countries.txt";
  $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
  $select = '<select class="textForm" name="country" id="value">';
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
    <form class="contactForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
      <div class="contactFormContainer">
        <div class="contactFormGroup">
          <div>
            <label>
              First Name*
              <span class="error">
                <?php echo $nameError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="firstName" value="<?php echo $firstName; ?>"/>
          </div>
          <div>
            <label>
              Last Name*
              <span class="error">
                <?php echo $lastNameError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="lastName" value="<?php echo $lastName; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div>
            <label>
              Email Address*
              <span class="error">
                <?php echo $emailError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="email" value="<?php echo $email; ?>"/>
          </div>
          <div>
            <label>
              Telephone Number*
              <span class="error">
                <?php echo $teleError; ?>
              </span>
            </label>
            <input class="textForm" type="text" name="tele" value="<?php echo $tele; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div>
            <label>Address 1</label>
            <input class="textForm" type="text" name="address1" value="<?php echo $address1; ?>"/>
          </div>
          <div>
            <label>Address 2</label>
            <input class="textForm" type="text" name="address2" value="<?php echo $address2; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div>
            <label>Town</label>
            <input class="textForm" type="text" name="town" value="<?php echo $town; ?>"/>
          </div>
          <div>
            <label>County</label>
            <input class="textForm" type="text" name="county" value="<?php echo $county; ?>"/>
          </div>
        </div>
        <div class="contactFormGroup">
          <div>
            <label>Postcode</label>
            <input class="textForm" type="text" name="postcode" value="<?php echo $postcode; ?>"/>
          </div>
          <div>
            <label>Country</label>
            <?php echo $select; ?>
          </div>
        </div>
        <label>
          Description*
          <span class="error">
            <?php echo $messageError; ?>
          </span>
        </label>
        <textarea class="textArea" name="message" rows="4" cols="50">
          <?php echo $message; ?>
        </textarea>
        <label>Your C.V</label>
        <input class="uploadField" type="file" name="upload" />
        <button class="submitButton" type="submit" name="submitBTN">
          SUBMIT
        </button>
      </div>
    </form>
  </body>
</html>
