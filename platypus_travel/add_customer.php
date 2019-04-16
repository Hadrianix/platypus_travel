<?php
    session_start();
    // this is for processing the customer form
    $customer_data;

    if(isset($_POST["submit"])) {
        // I start my validation
        $error_msg = "";
        if (!$_POST["CustFirstName"]) {
            $error_msg .= "This form requires a first name.<br>";
            // same as: $error_msg = $error_msg . "This form requires a first name.<br>";
        }
        if (!$_POST["CustLastName"]) {
            $error_msg .= "This form requires a last name.<br>";
        }
        if (!$_POST["CustCountry"]) {
            $error_msg .= "this form requires a country.<br>";
        }
        if (!$_POST["CustEmail"]) {
            $error_msg .= "this form requires an email address. <br>";
        } elseif (!filter_var($_POST["CustEmail"], FILTER_VALIDATE_EMAIL)) {
            $error_msg .= "the email address is invalid. <br>";
        }
        if (!$_POST["AgentId"] === 7) {
            $_POST["AgentId"] = 7;
        }
        // $error_msg is still empty, then I have good data
        //$first, $last, $add, $city, $prov, $post, $country, $homeph, $busph, $email, $agent, $id=NULL
        include_once('php/classes.php');
        if(empty($error_msg)){
            $customer_data = new Customer(
                
                $_POST['CustFirstName'],
                $_POST['CustLastName'],
                $_POST['CustAddress'],
                $_POST['CustCity'],
                $_POST['CustProv'],
                $_POST['CustPostal'],
                $_POST['CustCountry'],
                $_POST['CustHomePhone'],
                $_POST['CustBusPhone'],
                $_POST['CustEmail'],
                $_POST['AgentId']);
               

                
        }

        
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("php/head.php"); ?>
    <title>Travel Experts|Add Customer</title>
</head>
<body>
    
    
    <?php include_once("php/nav.php"); ?>
    <?php include_once("php/header.php"); ?>
    
    <div class="container">
    <div class="row">
    <div class="col-md-6">
        <h1>Add a Customer</h1>
        <br>
        <?php
            include_once("php/functions.php");
            // if this is the first pass, there would be no $error_msg
            if (isset($error_msg)) {
                //if $error_msg is empty then the form was valid
                if ($error_msg == "") {
                    $result = insertCustomer($customer_data);
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="form-group">
                <label for="CustFirstName">First Name:</label>
                <input type="text" class="form-control" name="CustFirstName" placeholder="First Name" require 
                value="<?php if (isset($_POST['CustFirstName'])) {echo $_POST['CustFirstName'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustLastName">Last Name:</label>
                <input type="text" class="form-control" name="CustLastName" placeholder="Last Name" require value="<?php if (isset($_POST['CustLastName'])) {echo $_POST['CustLastName'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustAddress">Address:</label>
                <input type="text" class="form-control" name="CustAddress" placeholder="Address" value="<?php if (isset($_POST['CustAddress'])) {echo $_POST['CustAddress'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustCity">City:</label>
                <input type="text" class="form-control" name="CustCity" placeholder="City" value="<?php if (isset($_POST['CustCity'])) {echo $_POST['CustCity'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustProv">Province:</label>
                <input type="text" class="form-control" name="CustProv" placeholder="Province" maxlength="2" value="<?php if (isset($_POST['CustProv'])) {echo $_POST['CustProv'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustPostal">Postal Code:</label>
                <input type="text" class="form-control" name="CustPostal" placeholder="Postal Code" value="<?php if (isset($_POST['CustPostal'])) {echo $_POST['CustPostal'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustCountry">Country:</label>
                <input type="text" class="form-control" name="CustCountry" require value="<?php if (isset($_POST['CustCountry'])) {echo $_POST['CustCountry'];} else {echo "Canada";}?>">
            </div>
            <div class="form-group">
                <label for="CustHomePhone">Home Phone Number:</label>
                <input type="text" class="form-control" name="CustHomePhone" placeholder="Home Phone Number" value="<?php if (isset($_POST['CustHomePhone'])) {echo $_POST['CustHomePhone'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustBusPhone">Business Phone Number:</label>
                <input type="text" class="form-control" name="CustBusPhone" placeholder="Business Phone Number" value="<?php if (isset($_POST['CustBusPhone'])) {echo $_POST['CustBusPhone'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="CustEmail">Email:</label>
                <input type="text" class="form-control" name="CustEmail" placeholder="Email" require value="<?php if (isset($_POST['CustEmail'])) {echo $_POST['CustEmail'];} else {echo "";}?>">
            </div>
            <div class="form-group">
                <label for="AgentId">Agent:</label>
                <input type="number" class="form-control" name="AgentId" require value="<?php if (isset($_POST['AgentId'])) {echo $_POST['AgentId'];} else {echo 7;}?>">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Add Customer">
            </div>
        </form>
    </div>
    </div>
    </div>

    <?php include_once("php/footer.php"); ?>
    <script>
        <?php include_once("php/base_js.php") ?>
    </script>
</body>
</html>