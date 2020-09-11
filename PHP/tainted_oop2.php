<?php
    class User {
        // Atribut
        public $userId;
        public $name;

        //Konstruktor
        public function __construct($userId, $name) {
            $this->userId = $userId;
            $this->name = $name;
            $sql = "INSERT INTO Users(name) VALUES (\"".$name."\")";  // Variabel berisi query                                        
            $mysqli = mysqli_connect("HOST", "USER", "PASS", "DB");   // Koneksi ke basis data (SINK)
            $res = mysqli_query($mysqli, $sql);                       // Melakukan query di basis data
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
    $input_name = $_POST["Name"];                                   // Tainted data id masukan pengguna (SOURCE)
    $student = new Student(1, $input_name, "Informatics");          // Objek baru class Student
?>
