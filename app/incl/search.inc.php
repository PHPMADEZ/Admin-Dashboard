<?php
if(isset($_REQUEST["term"]))
{
  //#variables
  $uid = '';
  //#classes include
  include "../classes/db.class.php";
  include "../classes/utility.class.php";
  include "../controllers/utility.cont.php";
  //#instance of utility class       
  $utility = new utilityCont($uid);
  //#get users
  $utility->showSearchUsers();
    
} 