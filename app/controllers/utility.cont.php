<?php
class utilityCont extends utility {
    
    //atributes
    private $uid;

    public function __construct($uid) {
        $this->uid = $uid;
    }
    /*
    -- Generate an invite code
    - @param $length - the length of the invite code
    - @return $invite - the invite code
    */
    public function generateInvite() {
        $invite = $this->generateRandomString();
        return $invite;
    }


    public function makeNotification($uid, $message) {
        $this->insertNotification($uid, $message);
    }
    //display all notifications
    public function displayNotifications() {
        $notifications = $this->getNotifications();
        return $notifications;
       
    }

    /*
    -- Display the list of invites
    - @return $invites - the list of invites
    */
    public function showInviteList() {
        $invites = $this->showInvites();
        return $invites;
    }
    /*
    -- Display the list of users
    - @return $users - the list of users
    */
    public function showUsers() {
        $users = $this->showSearchUsers();
        return $users;
    }
    /*
    -- Randomize the list of users
    - @return $users - the list of users
    */
    public function randomizeUsersList() {
        $this->randomizeUsers();
    }
    /*
    -- Display the tokens from a user
    - @return $tokens - the list of tokens
    */
    public function showTokens() {
        $tokens = $this->getToken($this->uid);
        return $tokens;
    }
    /*
    -- get cheat status
    - @return $status - the cheat status
    */
    public function getCheat(){
        $cheat = $this->selectCheatStatus();
        return $cheat;
    }
    /*
    -- get website status
    - @return $status - the website status
    */
    public function websiteStatus(){
        $this->updateWebsiteStatus($status);
    }
    /*
    -- get loader status
    - @return $status - the loader status
    */
    public function loaderStatus(){
        $this->updateLoaderStatus($status);
    }
    /*
    -- insert reason
    - @return $status - the hwid status
    */
    public function insertHwidReason(){
        $this->insertReason($reason, $user);
    }


}