<?php

class AdminCont extends Admin {

    /*
    -- gets all the users from the database
    - @return $users - the list of users
    */
    public function showUsers() {
        $users = $this->getAllUsers();
        return $users;
    }
    /*
    -- deletes a user from the database
    - @param $uid - the user id
    - execute a delete statement to delete the user.
     */
    public function deleteUsers($uid) {
        $this->deleteUser($uid);
    }
    /*
    -- adds a week to the database
    - @param $week - the week
    - execute a insert statement to insert the week.
    */
    public function updateWeek() {
        $this->addWeek();
    }
    /*
    -- adds a day to the database
    - @param $day - the day
    - execute a insert statement to insert the day.
    */
    public function updateDay() {
        $this->addDay();
    }
    /*
    -- adds a token to a user
    - @param $uid - the user id
    - @param $token - the token
    - execute a insert statement to insert the token.
    */
    public function updateToken($uid) {
        $this->addToken($uid);
    }  
    //add admin
    public function addAsAdmin($uid, $pwd, $email) {
        $this->addAdmin($uid, $pwd, $email);
    }

    public function status() {
        $status = $this->getProfileStatus($uid);
        return $status;
    }
}