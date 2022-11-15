<?php 

class utility extends Database
{
    
    /* 
    -- Generates a random string of characters loops.
    - @param $length - the length of the string to generate.
    - @param $keyspace - a string of all possible characters to select from.
    - @return $str - the generated string.
    */
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /*
    -- Inserts an invite in the database.
    - @param $invite - the invite to insert.
    - @param $user - the user who created the invite.
    - @return $stmt - the statement.
    */
    public function insertInvite($invite, $user) {
        $stmt = $this->connect()->prepare('INSERT INTO invites (invite, users_uid, TOC) VALUES (?, ?, current_timestamp());');
        if(!$stmt->execute(array($invite, $user))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
        $this->removeToken($user);
    }

    public function insertInviteA($invite, $user) {
        $stmt = $this->connect()->prepare('INSERT INTO invites (invite, users_uid, TOC) VALUES (?, ?, current_timestamp());');
        if(!$stmt->execute(array($invite, $user))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;

    }

    //insert a notification in the database
    public function insertNotification($user, $action) {
        $stmt = $this->connect()->prepare('INSERT INTO notifications (user, action, datetime) VALUES (?, ?, current_timestamp());');
        if(!$stmt->execute(array($user, $action))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    //display * notification no user
    public function getNotifications() {
        $stmt = $this->connect()->prepare('SELECT * FROM notifications ORDER BY datetime DESC LIMIT 15;');
        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $notifications;
    }


    /*
    -- gets the token from a user
    - @param $uid - the user id
    - execute a select statement to get the token.
    */
    public function getToken($user) {
        $stmt = $this->connect()->prepare('SELECT tokens FROM users WHERE users_uid = ?;');
        if(!$stmt->execute(array($user))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $result = $stmt->fetch();
        $stmt = null;
        return $result['tokens'];
    }
    /*
    -- removes the token from a user
    - @param $uid - the user id
    - execute a delete statement to remove the token.
    */
    public function removeToken($user) {
        $stmt = $this->connect()->prepare('UPDATE users SET tokens = tokens - 1 WHERE users_uid = ?;');
        if(!$stmt->execute(array($user))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    /*
    -- Display invites by user.
    - @param $uid - the user id.
    - @return $stmt - the statement.
    */
    public function showInvites() {
        $db = $this->connect();
        $sql = "SELECT * FROM invites WHERE users_uid = ? LIMIT 6";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['useruid']]);
        $invites = $stmt->fetchAll();
        return $invites;
    }
    /*
    -- Show users with searchbar.
    - @param $uid - the user id.
    - @return $stmt - the statement.
    - Gets the row and execute a while loop to loop through the rows and display users.
    */
    public function showSearchUsers()
    {
        $db = $this->connect();
        $sql = "SELECT * FROM users WHERE users_uid LIKE :term";
        $stmt = $db->prepare($sql);
        $term = $_REQUEST["term"] . '%';
   
        $stmt->bindParam(":term", $term);
   
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){
                echo "<p>" . $row["users_uid"] . "</p>";
            }
        } else{
            echo "<p>no users</p>";
        }
    }
    /*
    -- Randomize a list of users, then give those users invites
    - @param $uid - the user id.
    */
    public function randomizeUsers() {
        $db = $this->connect();
        $sql = "SELECT * FROM users ORDER BY RAND() LIMIT 10";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        foreach ($users as $user) {
            $invite = $this->generateRandomString();
            $this->insertInviteA($invite, $user['users_uid']);
        }
    }
    /*
    -- select everything from the cheat_info table
    - @return $stmt - the statement.
    */
    public function selectCheatStatus(){
        $db = $this->connect();
        $sql = "SELECT * FROM cheat_info";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $cheat = $stmt->fetch();
        return $cheat;
    }
    /*
    -- Update cheat status in cheat_info table
    - @param $status - the status of the cheat.
    - @return $stmt - the statement.
    */
    public function updateCheatStatus($status){
        $db = $this->connect();
        $sql = "UPDATE cheat_info SET status_csgo = ? WHERE id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([$status]);
    }
    /* 
    -- update loader status in cheat_info table
    - @param $status - the status of the loader.
    - @return $stmt - the statement.
    */
    public function updateLoaderStatus($status){
        $db = $this->connect();
        $sql = "UPDATE cheat_info SET status_loader = ? WHERE id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([$status]);
    }
    /*
    -- update website status in cheat_info table
    - @param $status - the status of the website.
    - @return $stmt - the statement.
    */
    public function updateWebsiteStatus($status){
        $db = $this->connect();
        $sql = "UPDATE cheat_info SET status_website = ? WHERE id = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([$status]);
    }
    /*
    -- insert reason into hwid table
    */
    public function insertReason($reason, $user) {
        $db = $this->connect();
        $sql = "INSERT INTO hwid_reset (reason, userid, reset_time) VALUES (?, ?,current_timestamp())";
        $stmt = $db->prepare($sql);
        $stmt->execute([$reason, $user,]);
    }

    

}