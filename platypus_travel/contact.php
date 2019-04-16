<?php
    session_start();

    if (isset($_POST['submit'])){
        $error_msg = "";
        if (!$_POST["email"]) {
            $error_msg .= "We require an email for this form.<br>";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $error_msg .= "This is an invalid email address. <br>";
        }
        if (!$_POST["subject"]) {
            $error_msg .= "We require a subject for this form.<br>";
        }
        if (!$_POST["content"]) {
            $error_msg .= "We require content for this form.<br>";
        }

        if($error_msg === "") {
            date_default_timezone_set('America/Edmonton');

            $headers = "From: ". $_POST['email'] . "\r\n";
            $headers .= "CC: assistant@email.com" . "\r\n";

            $subject = "From the website: " .$_POST['subject'];

            $content = date("l, F j, Y at g:i a", time()) ."\r\n";
            $content .= $_POST['content'];
            $content .= $_POST['email'];

            // for testing purposes
            // echo $_POST['email'],
            // $subject,
            // $content,
            // $headers;
            // actual mail sending, please setup SMTP in php.ini file first
            mail('admin@email.com',
                $subject,
                $content,
                $headers);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- place unique css here for this page -->
	<?php include_once("php/head.php") ?>
	
	<title>Never Miss a Beat Travel</title>
</head>
<body>
	

	<?php include_once("php/nav.php"); ?>

    <?php include_once("php/header.php"); ?>

    <div class="container">
        <section>
            <h2> Stay In Contact!</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email Address:</label> <!--user's email address -->
                    <input type="email" class="form-control" name="email" placeholder="Please enter your valid email address" require 
                    value="<?php if (isset($_POST['email'])) {echo $_POST['email'];} else {echo "";}?>">
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label> <!--email subject -->
                    <input type="text" class="form-control" name="subject" placeholder="What is the subject of your inquiry" require 
                    value="<?php if (isset($_POST['subject'])) {echo $_POST['subject'];} else {echo "";}?>">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label> <!--email subject -->
                    <textarea class="form-control" name="content" placeholder="Let us know your thoughts." rows="3" require 
                    value="<?php if (isset($_POST['content'])) {echo $_POST['content'];} else {echo "";}?>"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Send Email">
                </div>
            </form>
        </section>
    </div>  
	<?php include_once('php/footer.php'); ?>
	<?php include_once('php/basejs.php'); ?>
	<script>
		// Place my unique js for this page here.
	</script>
</body>
</html>