<?php

class Login extends Database {

    /*
    -- gets the user from the database if it exists, it will log you in. If false, it will return an error.
    - @param $username - the username of the user   
    - @param $password - the password of the user
    */
    protected function getUser($uid, $pwd) {
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }


        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            
            if(!$stmt->execute(array($uid, $uid, $pwd))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            session_start();

            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["useruid"] = $user[0]["users_uid"];
            $_SESSION["role"] = $user[0]["role"];
            if ($user[0]["role"] == "admin") {
                $_SESSION["admin"] = true;
                
            }
            elseif ($user[0]["role"] == "user") {
                $_SESSION['user'] = true;
            }

            $stmt = null;
        }
    }

}

