<?php
    include 'config.php';

    class User extends Config
    {
        public function login($username,$password)
        {
            $sql = "SELECT * FROM accounts WHERE username = '$username'";
            $result = $this->conn->query($sql);
            
            if($result->num_rows > 0)
            {
                $account_details = $result->fetch_assoc();

                if(password_verify($password,$account_details["password"]))
                { 
                    session_start();

                    $_SESSION["account_id"] = $account_details["account_id"];
                    
                    if($account_details["status"] == "A")
                    {
                        header("Location:admin.php");
                    }
                    elseif($account_details["status"] == "U")
                    {
                        header("Location:user.php");
                    }
                }
                else
                {
                    header("Location:index.php?success=0&message=Incorrect password. Kindly try again.");
                }
            }
            else
            {
                header("Location:index.php?success=0&message=Incorrect username and/or password. Kindly try again.");
            }
        }

        public function signup($firstname,$lastname,$address,$contact_number,$username,$password)
        {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            //check if username already exists
            $sql = "SELECT * FROM accounts WHERE username = '$username'";
            $result = $this->conn->query($sql);

            //if the condition evaluates to true, username already exists
            if($result->num_rows > 0)
            {
                header("Location:signup.php?success=0&message=Username already taken.");
            }
            else
            {
                $sql = "INSERT INTO accounts(username,password) VALUES ('$username','$hash_password')";
                $result = $this->conn->query($sql);
                
                if($result)
                {
                    $account_id = $this->conn->insert_id;
                    
                    $sql = "INSERT INTO users(first_name,last_name,address,contact_number,account_id) VALUES('$firstname','$lastname','$address','$contact_number',$account_id)";
                    $result = $this->conn->query($sql);

                    if($result)
                    {
                        header("Location:index.php?success=1&message=Sign up successful.");
                    }
                    else
                    {
                        header("Location:signup.php?success=0&message=An error occured. Kindly try again.");
                    }

                }
                else
                {
                    header("Location:signup.php?success=0&message=An error occured. Kindly try again.");
                }
            }

        }
    }
?>