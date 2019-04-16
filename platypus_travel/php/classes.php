<?php

    class Customer {
        public $CustomerId = "";
        public $CustFirstName = "";
        public $CustLastName = "";
        public $CustAddress = "";
        public $CustCity = "";
        public $CustProv = "";
        public $CustPostal = "";
        public $CustCountry = "";
        public $CustHomePhone = "";
        public $CustBusPhone = "";
        public $CustEmail = "";
        public $AgentId = 1;
        protected $fullname = NULL;

        public function __construct($first, $last, $add, $city, $prov, $post, $country, $homeph, $busph, $email, $agent, $id=NULL){
            
            $this->CustomerId = $id;
            $this->CustFirstName = $first;
            $this->CustLastName = $last;
            $this->CustAddress = $add;
            $this->CustCity = $city;
            $this->CustProv = $prov;
            $this->CustPostal = $post;
            $this->CustCountry = $country;
            $this->CustHomePhone = $homeph;
            $this->CustBusPhone = $busph;
            $this->CustEmail = $email;
            $this->AgentId = $agent;
        }

        public function __toString(){
            return $this->CustLastName .", " .$this->CustFirstName ." -- " . $this->CustEmail;
        }
        // I am returning a full name string programatically
        public function printFullName() {
            return $this->CustFirstName . " ". $this->CustLastName;
        }

        // I am setting a new property called fullname with my Full name.
        public function makeFullName() {
            $this->fullname = $this->CustFirstName . " ". $this->CustLastName;
        }

        // Retrieving the full name from the fullname property
        public function getFullName() {
            return $this->fullname;
        }

        public function printAddress(){
            $address = "<h5>".$this->CustAddress . "</h5>";
            $address .= "<h6>" .$this->CustCity . ", " .$this->CustProv . "  ". $this->CustPostal . "</h6>";
            return $address;
        }
    }
    

    // class Agent {
    //     public $AgentId = "";
    //     public $AgtFirstName = "";
    //     public $AgtLastName = "";
    //     public $AgtBusPhone = "";
    //     public $AgtEmail = "";
    //     public $AgtPosition = "";
    //     public $AgentId = 1;
    //     protected $fullname = NULL;
    // }

    // public function __construct($first, $last, $bus, $position, $agent, $id=NULL){
            
    //         $this->AgtId = $id;
    //         $this->AgtFirstName = $first;
    //         $this->AgtLastName = $last;
    //         $this->AgtBusPhone = $bus;
    //         $this->AgtPosition = $position;
    //         $this->AgentId = $agent;
    // }

    // public function __toString(){
    //         return $this->AgtLastName .", " .$this->AgtFirstName;
    //     }


?>