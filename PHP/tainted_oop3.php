<?php
    interface User {
        public function saveToDB($userId, $name);
    }
    // Student implementasi interface User
    class Student implements User {

        public function saveToDB($userId, $name) {                                   // Fungsi saveToDB Student
            $sql = "INSERT INTO Users(id,name) VALUES (".$userId.",\"".$name."\")";  // Variabel berisi query                                        
            $mysqli = mysqli_connect("HOST", "USER", "PASS", "DB");                  // Koneksi ke basis data (SINK)
            $res = mysqli_query($mysqli, $sql);                                      // Melakukan query di basis data
        }
    }
    // Guest implementasi interface User
    class Guest implements User {

        public function saveToDB($userId, $name) {                  // Fungsi saveToDB Guest
            echo "You can't save your data.";
        }
    }

    $input_role = $_GET["Role"];
    $input_id = $_GET["UserId"];
    $input_name = $_GET["Name"];                                   // Tainted data id masukan pengguna (SOURCE)
    if ($input_role == "STUDENT"){                                 // Role adalah student
        $person = new Student();
    } else{
        $person = new Guest();
    }
    $person->saveToDB($input_id, $input_name);
?>
