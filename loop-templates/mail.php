

<?php


$email = $_GET["email"];
//echo $email;

?>

<script type="text/javascript">

console.log('<?php echo $email; ?>');

</script>

<?php

     $to      = 'mathieu.dussault@gmail.com'; // contact@capricci.fr
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: webmaster@example.com' . "\r\n" .
     'Reply-To: webmaster@example.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);


?>


