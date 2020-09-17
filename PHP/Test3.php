<?php
    class User {
        // Atribut
        public $userId;
        public $name;

        //Konstruktor
        public function __construct($userId, $name) {
            $this->userId = $userId;
            $this->name = md5($name);               
        }
    }
    // Student inheritance dari User
    class Student extends User {
        // Atribut
        public $major;

        // Konstruktor
        public function __construct($userId, $name, $major) {
            parent::__construct($userId, $name);
            $this->userId = $userId;
            $this->name = $name;
            $this->major = $major;
        }
    }
    $input_name = $_POST["Name"];  
    $input_nim = $_POST["NIM"];                                 
    
    if ($input_nim == "135") {
        $student = new Student($input_nim, $input_name, "Informatics");
        $sql = "INSERT INTO Users(name) VALUES (\"".$input_name."\")";   
    }
    elseif ($input_nim == "182") {
        $student = new Student($input_nim, $input_name, "Information System and Technology");
        $sql = "INSERT INTO Users(name) VALUES (\"".$input_name."\")"; 
    }
    elseif ($input_nim == "104") {
        $student = new Student($input_nim, $input_name, "Microbiology");
        $sql = "INSERT INTO Users(name) VALUES (\"".$input_name."\")"; 
    }
    elseif ($input_nim == "106") {
        $student = new Student($input_nim, $input_name, "Biology");
        $sql = "INSERT INTO Users(name) VALUES (\"".$input_name."\")"; 
    }                                   
    $mysqli = mysqli_connect("HOST", "USER", "PASS", "DB");                  
    $res = mysqli_query($mysqli, $sql);                     
?>
