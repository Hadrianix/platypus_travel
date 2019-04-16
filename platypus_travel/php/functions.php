<?php

function connectDB(){
    
    $host = "localhost";
    $user = "admin";
    $password = "password";
    $dbname = "travelexperts";

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_errno){
        print("ERROR: There was an error connecting to the database<br>");
        print("ERROR NUMBER: ". $link->connect_errno . "<br>");
        print("ERROR MESSAGE: ". $link->connect_error . "<br>");
        exit();
    }
    return $conn;
}

function closeDB($conn) {
    $conn->close();
}

function insertCustomer($customer){
    //$customer is a Customer object
    // add a new customer to the customers table
    $conn = connectDB();


    $sql = "INSERT INTO customers (CustFirstName, CustLastName, CustAddress, CustCity, CustProv, CustPostal, CustCountry, CustHomePhone, CustBusPhone, CustEmail, AgentId) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param('ssssssssssi',
        $customer->CustFirstName,
        $customer->CustLastName, 
        $customer->CustAddress,
        $customer->CustCity,
        $customer->CustProv,
        $customer->CustPostal,
        $customer->CustCountry,
        $customer->CustHomePhone,
        $customer->CustBusPhone,
        $customer->CustEmail,
        $customer->AgentId);

        if(!$stmt->execute()){
            print("ERROR: there was an error submitting your SQL to the database <br>");
            print("ERROR NUMER: ". $stmt->errno . "<br>");
            print("ERROR MESSAGE: ". $stmt->error . "<br>");
            $message = "There was an error: Customer was not added to the database";
        } else {
            $message = "New customer was added to the database"; 
            // this is for the user as confirmation
        };
        $stmt->close();
    }

    closeDB($conn);

    return $message; //returning a user message
}

function getCustomers(){
    // getting all customers from the travel experts database.
    $conn = connectDB();

    $sql ="SELECT * FROM customers";

    if (!$result = $conn->query($sql)){
        print("ERROR: there was an error submitting your SQL to the database <br>");
        print("SQL: $sql <br>");
        print("ERROR NUMER: ". $conn->errno . "<br>");
        print("ERROR MESSAGE: ". $conn->error . "<br>");
    }

    $cust_array = [];
    
    // need to loop through as fetch_assoc gets one row at a time from result set.
    // ($first, $last, $add, $city, $prov, $post, $country, $homeph, $busph, $email, $agent, $id=NULL)
    include_once("php/classes.php");
    
    while ($cust = $result->fetch_assoc()){
        $cust_array[] = new Customer($cust['CustFirstName'],
                                    $cust['CustLastName'],
                                    $cust['CustAddress'],
                                    $cust['CustCity'],
                                    $cust['CustProv'],
                                    $cust['CustPostal'],
                                    $cust['CustCountry'],
                                    $cust['CustHomePhone'],
                                    $cust['CustBusPhone'],
                                    $cust['CustEmail'],
                                    $cust['AgentId'],
                                    $cust['CustomerId']);
    }

    $result->free(); // free up memory

    closeDB($conn); // clean up connection

    return $cust_array;// array of customer objects
}

function giveGreeting() {

    include("php/variables.php");

    date_default_timezone_set('America/Edmonton');

    $current = getdate(time()); 

    if ($current["hours"] > 18) {
        $greeting = $greet[2];
    } elseif ($current["hours"] > 12) {
        $greeting = $greet[1];
    } else {
        $greeting = $greet[0];
    }
    return $greeting; //string
}



?>