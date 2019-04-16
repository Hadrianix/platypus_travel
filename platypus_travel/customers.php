<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>No Beat</title>
</head>
<body>
    
    <?php include("php/nav.php"); ?>
    <?php include("php/header.php"); ?>
    <div class="container">
        <h1>Customer List</h1>
        <div class="col-md-8">
        <table class="table">
            <thead>
                <tr scope="row">
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include_once("php/functions.php");

                $customers = getCustomers(); // array of Customer Objects

                foreach($customers as $cust) {
                    print("<tr scope='row'>");
                    print("<td>". $cust->printFullName() . "</td>");
                    print("<td>". $cust->CustAddress. "</td>");
                    print("<td>". $cust->CustHomePhone ."</td>");
                    print("<td>" . $cust->CustEmail . "</td>");
                    print("</tr>");
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>

    <?php include("php/footer.php"); ?>
    <script>
        <?php include("php/basejs.php") ?>
    </script>
</body>
</html>