<?php

class loginCont extends Login {
    // Attributes
    private $uid;
    private $pwd;
    
    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }
    /*
    -- gets the user from the database if it exists, it will log you in. If false, it will return an error.
    - @param $username - the username of the user
    - @param $password - the password of the user
    */
    public function loginUser() {
        if($this->emptyInput() == false) {
            
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }
    /*
    -- checks if the input is empty
    - @return true if the input is empty
    - @return false if the input is not empty
    */
    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}