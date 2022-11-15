<?php

class Signup extends Database {

    /*
    -- inserts a new user into the database
    - @param $username - the username of the user
    - @param $email - the email of the user
    - @param $password - the password of the user
    - @return $stmt - the statement
    -- Password verifying with password_verify()
    */
    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    /*
    -- makes a new user from the adminpanel
    - @param $username - the username of the user
    - @param $email - the email of the user
    - @param $password - the password of the user
    - @return $stmt - the statement
    -- Password hashing with password_default;
    */
    public function setUserAdmin($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    /*
    -- Checks if the user already exists
    - @param $username - the username of the user
    - @param $email - the email of the user
    - @return $stmt - the statement
    */
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
    /*
    -- Checks the if the invite is valid or not
    - @param $invite - the invite of the user
    -- If the invite is valid, it will return true, else it will return false.
    */
    protected function checkInvite($invite) {
        $stmt = $this->connect()->prepare('SELECT * FROM invites WHERE invite= ?;');
        if(!$stmt->execute(array($invite))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result == false) {
            $stmt = null;
            header("location: ../index.php?error=invalidinvite");
            exit();
        }
        $stmt = null;
    }
    /*
    -- Deletes the invite after the user has signed up.
    - @param $invite - the invite of the user
    */
    protected function deleteInvite($invite) {
        $stmt = $this->connect()->prepare('DELETE FROM invites WHERE invite = ?;');
        if(!$stmt->execute(array($invite))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

   
    

    

}