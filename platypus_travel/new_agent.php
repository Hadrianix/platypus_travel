<?php
    // session_start();

    // if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true){
    //     header("Location: http://localhost/login.php");
    // }

    session_start();
    // this is for processing the customer form
    $agt_data;

    if(isset($_POST["submit"])) {
        // I start my validation
        $error_msg = "";
        if (!$_POST["AgtFirstName"]) {
            $error_msg .= "This form requires a first name.<br>";
            // same as: $error_msg = $error_msg . "This form requires a first name.<br>";
        }
        if (!$_POST["AgtMiddleIntial"]) {
            $error_msg .= "This form requires a last name.<br>";
        }
        if (!$_POST["AgtBusPhone"]) {
            $error_msg .= "This requires a business Phone <br>";
        }
        if (!$_POST["AgtEmail"]) {
            $error_msg .= "this form requires an email address. <br>";
        } elseif (!filter_var($_POST["AgtEmail"], FILTER_VALIDATE_EMAIL)) {
            $error_msg .= "the email address is invalid. <br>";
        }
        if (!$_POST["AgencyId"] === 7) {
            $_POST["AgencyId"] = 7;
        }
        // $error_msg is still empty, then I have good data
        if(empty($error_msg)){
            foreach($_POST as $key => $value){
                $agt_data[$key] = $value;
                // we know all data is good
            }
            include_once('./php/functions.php');
            insertagent($agt_data);
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
            <h1>Add a New Agent</h1>
            <?php
                    include_once("php/functions.php");
                    // if this is the first pass, there would be no $error_msg
                    if (isset($error_msg)) {
                        //if $error_msg is empty then the form was valid
                        if ($error_msg == "") {
                            $result = insertAgent($agent_data);
                            //we have processed all the data.
                            // if good delete $_POST data
                            if(strpos($result, 'error') === false){
                                $_POST = array();
                            }
                            print($result . "<br>");
                            
                        // if validation failed and $error_msg has content, print the content.
                        } elseif (!empty($error_msg)) {
                            print("<h4 style='color:red;'>$error_msg</h4>");
                        }
                    }
                ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="AgtFirstName">First Name:</label>
                    <input type="text" class="form-control" name="AgtFirstName" placeholder="First Name" require 
                    value="<?php if (isset($_POST['AgtFirstName'])) {echo $_POST['AgtFirstName'];} else {echo "";}?>">
                </div>
                <div class="form-group">
                    <label for="AgtLastName">Last Name:</label>
                    <input type="text" class="form-control" name="AgtLastName" placeholder="Last Name" require value="<?php if (isset($_POST['AgtLastName'])) {echo $_POST['AgtLastName'];} else {echo "";}?>">
                </div>
                <div class="form-group">
                    <label for="AgencyId">Agency:</label>
                    <select class="custom-select" name="AgencyId">
                        <?php 
                            $agencies = getAgencies();
                            foreach($agencies as $agency){
                                print("<option value='". $agency['AgencyId'] ."'>".$agency['AgncyAddress'].", ".$agency['AgncyCity']."</option>");
                            }
                        ?>
                        
                    
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Add Agent">
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