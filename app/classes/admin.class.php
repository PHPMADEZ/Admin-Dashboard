<?php

class Admin extends Database {

    /*
    # gets all the users from the database
    $ return $users - the list of users
    */
    public function getAllUsers() {
        $db = $this->connect();
        $sql = "SELECT * FROM users";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    /*
    -- deletes a user from the database
    $ @param $uid - the user id
    - execute a delete statement to delete the user.
    */
    public function deleteUser($uid) {
        $db = $this->connect();
        $sql = "DELETE FROM users WHERE users_uid = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$uid]);
    }
    /*
    -- adds a week to the database
    $ @param $week - the week
    - execute a insert statement to insert the week.
    */
    public function addWeek() {
        $db = $this->connect();
        $sql = "UPDATE users SET subscription = DATE_ADD(subscription, INTERVAL 1 WEEK)";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    /*
    # adds a day to the database
    $ @param $day - the day
    - execute a insert statement to insert the day.
    */
    public function addDay() {
        $db = $this->connect();
        $sql = "UPDATE users SET subscription = DATE_ADD(subscription, INTERVAL 1 DAY)";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
    /*
    # adds a user to the database
    $ @param $uid - the user id
    - execute a insert statement to insert the user.
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
    # adds a token to the database
    @param $token - the token
    - execute a insert statement to insert the token.
    */
    public function addToken($uid) {
        $db = $this->connect();
        $sql = "UPDATE users SET tokens = tokens + 1 WHERE users_uid = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$uid]);
    }

    //add a user as an admin without invitation
    public function addAdmin($uid, $pwd, $email) {
        $db = $this->connect();
        $sql = "INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt->execute([$uid, $hashedPwd, $email]);
    }


    public function updateProfileImg($uid) {
        $db = $this->connect();
        $sql = "UPDATE profileimg SET status = 0 WHERE userid = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$uid]);
    }

    //get profile status
    public function getProfileStatus($uid) {
        $db = $this->connect();
        $sql = "SELECT * FROM profileimg WHERE userid = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$uid]);
        $status = $stmt->fetch();
        return $status;
    }

    
}