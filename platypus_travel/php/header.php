<?php include_once("php/functions.php");?>
<header>
<div class="row">
	<?php
	include_once("php/variables.php");
	// print("<img id='logo' src='".$logos[array_rand($logos)]."'>");
	?>
	<!-- <h1 id="title">Travel Experts</h1> -->
	<h4 id="greeting"><?php print(giveGreeting()); ?></h4>
</div>
</header>