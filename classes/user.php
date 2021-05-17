<?php
require "database.php";
class User extends Database{

    public function checkUsername($username){
        $sql = "SELECT username FROM accounts WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 0){
            return false;
        }else{
            return true;
        }
    }

    public function register($first_name, $last_name, $gender, $b_day, $email, $postcode, $address, $username, $password){
        $accounts_sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($this->conn->query($accounts_sql)){
            $user_account_id = $this->conn->insert_id;

            $users_sql = "INSERT INTO users (first_name, last_name, email, gender, birthday,postcode, address, account_id) VALUES ('$first_name', '$last_name', '$email', '$gender', '$b_day', '$postcode', '$address', '$user_account_id')";

            if($this->conn->query($users_sql)){
                header("location: ../views/login.php");
                exit;
            }else{
                die("Error in inserting data into Users table: ".$this->conn->error);
            }
        }else{
            die("Error in inserting data into accounts table: ".$this->conn->error);
        }
    }

    public function login($username, $password){
        $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $user_details = $result->fetch_assoc();

            if(password_verify($password, $user_details['password'])){
               $_SESSION['user_id'] = $user_details['user_id'];
               $_SESSION['username'] = $user_details['username'];

               if($user_details['status'] == "A"){
                   header("location: ../views/dashboard.php");
                   exit;
               }elseif($user_details['status'] == "U"){
                    header("location: ../views");
               }
            }else{
                return "Invalid Password";
            }
        }else{
            return "Invalid Username";
        }
    }
}
?>