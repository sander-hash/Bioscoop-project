<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/PHPMailer/phpmailer/src/Exception.php';
require '../vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require '../vendor/PHPMailer/phpmailer/src/SMTP.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//Load Composer's autoloader
require '../vendor/autoload.php';

?>
<?php session_start();?>
<?php
if (isset($_SESSION['klantid'])){
$username = ($_SESSION["klantid"]);
}
?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="../resources/heisa.png"/>
    <title>Document</title>
</head>
<body>


<body>
<form method="post">
<div class="flex items-center min-h-screen bg-gray-50">
  <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
    <div class="flex flex-col md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img class="object-cover w-full h-full" src="../resources/heisa.png"
          alt="img" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <div class="flex justify-center">
          </div>
          <h1 class="mb-5 text-2xl font-bold text-center text-gray-700">
            Bestelling plaatsen
          </h1>
          <?php
          require ('../backend/showMoviesController.php');
          $lc = new showMoviesController();
          $lc->showMoviesIndex();

          ?>

      </div>
    </div>
  </div>
</div>
<form>
</body>

</html>



</body>
</html>

<?php



if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $stoelkeuze = $_POST['stoelkeuze'];
    $kaartjes = $_POST['kaartjes'];
    require("../backend/db.php");
    $row = $db->query( "SELECT id from klantLogin where username = '$username'" )->fetch();
    $id = $row["id"];
    

    
    


    $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'theheisawebshop';                     //SMTP username
        $mail->Password   = 'Heinensander1';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('theheisawebshop@gmail.com', 'Heisa webshop');
        $mail->addAddress($email);
        $mail->addReplyTo('theheisawebshop@gmail.com', 'Is er iets mis gegaan met u bestelling?');
        $mail->addCC('sanderjongenelen@hotmail.nl');

    
        //Attachments

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Bioscoop';
        $mail->Body    = 'Uw bestelling van heisawebshop!' . '<br>' .'Hieronder vind u een overzicht van de door u ingevoerde gegevens. <br>' .'<br>' . 'Email: ' . $email .'<br>' . 'Voornaam en achternaam: ' .$voornaam . ' ' . $achternaam . '<br>' . 'Stoelkeuze: ' .$stoelkeuze .'<br>'. 'Kaartjes: ' . $kaartjes;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        

        require('../backend/ticketsController.php');
        $lc = new ticketsController();
        $lc ->ticket($email, $voornaam, $achternaam, $kaartjes, $stoelkeuze, $id);

       

}





