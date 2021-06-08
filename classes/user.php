<?php
require_once "database.php";
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
               $_SESSION['account_id'] = $user_details['account_id'];

               if($user_details['status'] == "A"){
                   header("location: ../views/dashboard.php");
                   exit;
               }elseif($user_details['status'] == "U"){
                    header("location: ../views/homepage.php");
               }
            }else{
                return "Invalid Password";
            }
        }else{
            return "Invalid Username";
        }
    }

    public function getUserDetail($user_id){
        $sql = "SELECT * FROM users INNER JOIN accounts ON users.account_id = accounts.account_id WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);

        if($result->num_rows == "1"){
            return $result->fetch_assoc();
        }else{
            die("Error getting data: ".$this->conn->error);
        }
    }

    public function updateUser($user_id, $new_first_name, $new_last_name, $new_gender, $new_b_day, $new_email, $new_postcode, $new_address, $new_username, $new_password){
        
        $sql = "UPDATE users INNER JOIN accounts ON users.account_id = accounts.account_id
                SET users.first_name = '$new_first_name',
                    users.last_name = '$new_last_name',
                    users.email = '$new_email',
                    users.gender = '$new_gender',
                    users.birthday = '$new_b_day',
                    users.postcode = '$new_postcode',
                    users.address = '$new_address',
                    accounts.username = '$new_username',
                    accounts.password = '$new_password'
                WHERE user_id = '$user_id'";
        if($this->conn->query($sql)){
            header("location: ../views/homepage.php");
            exit;
        }else{
            die("Error updating User: ".$this->conn->error);
        }
    }
}
?>