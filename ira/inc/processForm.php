<?php


// Read the form values
$success = false;
$link = $_POST['link'];
$senderName = isset( $_POST['senderName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['senderName'] ) : "";
$senderEmail = isset( $_POST['senderEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['senderEmail'] ) : "";
$friendName = isset( $_POST['friendName'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['friendName'] ) : "";
$friendEmail = isset( $_POST['friendEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['friendEmail'] ) : "";

$message = 'Hello, ' . $friendName . '!<br/>Your friend, ' . $senderName . ' would like to share a gallery of photos online at Ira Lippke Studios.<br/><a href="' . $link . '">Click here</a> to see the gallery.';

// Define some constants
define( "RECIPIENT_NAME", "John Smith" );
define( "RECIPIENT_EMAIL", "..." );
define( "EMAIL_SUBJECT", "View a Gallery on Ira Lippke Studios" );


// If all values exist, send the email
if ( $senderName && $senderEmail ) {
  $recipient = $friendName . " <" . $friendEmail . ">";
  $headers = "From: share@iralippkestudios.com\r\n";
  $headers .= "Reply-To: share@iralippkestudios.com\r\n";
	$headers .= "BCC: mattwooddc@gmail.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $success = mail( $recipient, EMAIL_SUBJECT, $message, $headers );
}

// Return an appropriate response to the browser
if ( isset($_GET["ajax"]) ) {
  echo $success ? "success" : "error";
} else {
?>
<html>
  <head>
    <title>Thanks!</title>
  </head>
  <body>
  <?php if ( $success ) echo "<p>Thanks for sending your message! We'll get back to you shortly.</p>" ?>
  <?php if ( !$success ) echo "<p>There was a problem sending your message. Please try again.</p>" ?>
  <p>Click your browser's Back button to return to the page.</p>
  </body>
</html>
<?php
}
?>


