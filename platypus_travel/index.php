<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- place unique css here for this page -->
	<?php include_once("php/head.php") ?>
	<title>Platypus Travel | Home</title>
</head>
<body>
	

	<?php include_once("php/nav.php"); ?>
<section>
    
	
	<?php include_once("php/carousel.php"); ?>
	<h1>Travel the World with Ease</h1>
    <?php include_once("php/header.php"); ?>
    <h3>How can we help you get where you wanna go?</h3>
    
    
	<div class="container">
		<div class="col-md-5">
			<table class="table">
				<thead>
					<tr>
						<th class="col">Image</th>
						<th class="col">Destination</th>
					</tr>	
				</thead>
				<tbody>
				<?php
					include_once("php/variables.php");
					// Getting $destinations from variables.php above and creting a dynamic table of links.
					foreach($destinations as $url => $label){
						print("<tr class='row'><td>image</td>");
						print("<td><a href='$url' target='_blank'>$label</td></tr>");
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</section>
	<?php include_once('php/footer.php'); ?>
	<?php include_once('php/basejs.php'); ?>
	<script>
		// Place my unique js for this page here.
		<?php
			include_once("php/variables.php");
			print("let greet = [");
			foreach ($greet as $item){
				print("'$item', ");
			}
			print("];");
		?>
		// The above php is to create the following line but using the information from a php variable to create it.
			// let greet = ["Good Morning", "Good Afternoon",];
		let greeting = document.getElementById("greeting");
		
		if (greeting.innerHTML == greet[0]){
			greeting.style.color = "orange";
		} else if (greeting.innerHTML == greet[1]){
			greeting.style.color = "red";
		} else {
			greeting.style.color = "purple";
		}

	</script>
</body>
</html>