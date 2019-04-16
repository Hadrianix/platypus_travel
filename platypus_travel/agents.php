<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("php/head.php"); ?>
    <title>Never Miss a Beat Travel</title>
</head>
<body>
    
    <?php include_once("php/nav.php"); ?>
    <?php include_once("php/header.php"); ?>
    <div class="container">
        <h1>Our Agents</h1>
        
        <div class="row">
        <div class="col-md-4">
        <?php 
            include_once("php/functions.php");

            $agencies = getAgencies();

            foreach($agencies as $agency){
                print("<div class='card'>");
                print("<div class='card-header'>Agency #".$agency['AgencyId']."</div>");
                print("<ul class='list-group list-group-flush'>");
                foreach($agency as $field => $data){
                    if($field !== "AgencyId"){
                    print("<li class='list-group-item'><em>$field:</em> $data</li>");
                    }
                }
                print("</ul></div></div>");
            }
        ?>
        </div>
        <!-- <div class="card" style="width: 18rem;">
            <div class="card-header">
                Featured
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            </div>
        </div> -->
        <!-- Agency cards for each agency -->
        </div>
    </div>

    <?php include_once("php/footer.php"); ?>
    <script>
        <?php include_once("php/base_js.php") ?>
    </script>
</body>
</html>