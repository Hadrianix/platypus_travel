<?php
    session_start();

    // checking if this is the first time to the page (no submit)
    if(isset($_POST["submit"])){
        $user_list = array("adrian" => "adrian",
        "adrian" => "adrian");
        // checking if the $_POST[username] exist in the user_list as a key
        if (isset($user_list[$_POST['username']])){
            if($user_list[$_POST['username']] === $_POST['password']){
                $_SESSION['logged_in'] = true;
                header("Location: http://localhost/never-miss-a-beat-travel/index.php");
            } else {
                print("I could not authenticate your username and password.");
            }
        } else {
            print("I could not authenticate your username and password.");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php include_once("php/head.php") ?>
	
	<title>Platypus Travel</title>
</head>
<body>
	

	<?php include_once("php/nav.php"); ?>

    

    <div class="jumbotron jumbotron-fluid">
        
        <div class="container">
            <h1 class="display-4">Log In</h1>
            <!-- <br>
            <p class="lead">Get all the Latest deals</p> -->
        </div>
    </div>  
    <?php include_once("php/header.php"); ?>
    <div class="container">
        <section>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login">
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