<?php

  $exampleFirstName = "John";
  $exampleLastName = "Doe";
  $exampleEmail = "john.doe@mail.com";
  $exampleAddress = "87 Jubilee Drive<br>CAYTON<br>YO11 9QS";
  $exampleTelephone = "+447077210188";
  $exampleMessage = "Hello World.";
  


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
      <th class="tg-0pky">'.$exampleFirstName.'</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="tg-0lax">Last Name</td>
      <td class="tg-0lax">'.$exampleLastName.'</td>
    </tr>
    <tr>
      <td class="tg-0lax">Email Address</td>
      <td class="tg-0lax">'.$exampleEmail.'</td>
    </tr>
    <tr>
      <td class="tg-0lax">Telephone Number</td>
      <td class="tg-0lax">'.$exampleTelephone.'</td>
    </tr>
    <tr>
      <td class="tg-0lax">Address</td>
      <td class="tg-0lax">'.$exampleAddress.'</td>
    </tr>
    <tr>
      <td class="tg-baqh" colspan="2">Message</td>
    </tr>
    <tr>
      <td class="tg-0lax" colspan="2">'.$exampleMessage.'</td>
    </tr>
  </tbody>
  </table>';
?>

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
   <?php echo $htmlContent; ?>
  </body>
</html>
