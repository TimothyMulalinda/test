<?php
class Home_model {
    private $db;

    public function __construct() {
        $this->db = new Database;

        if($this->db->connect_error) {
            echo "<script>console.log('Database connection failed');</script>";
        } else {
            echo "<script>console.log('Database connection successful');</script>";
        }
    }

    public function input_data($data) {
        try {
            $reg_number = $data['reg_number'];
            $nim_number = $data['nim_number'];
            $email = $data['email'];
            $fullname = $data['fullname'];
            $password = $data['password'];

            date_default_timezone_set('Asia/Makassar');
            $datanow = date('Y-m-d H:i:s');

            $sql = "INSERT INTO tbl_students (reg_number, nim_number, email, fullname, password, created_at, updated_at) 
                    VALUES ('$reg_number', '$nim_number', '$email', '$fullname', '$password', '$datanow', '$datanow')";

            if($this->db->query($sql) === TRUE) {
                return "success";
            } else {
                return "failed";
            }
        } catch (Exception $e) {
            return "error";
        }
    }
}
?>
