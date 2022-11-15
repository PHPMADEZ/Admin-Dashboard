<?php
//#logout user
session_start();
session_unset();
session_destroy();
//#redirect to login page
header("location: /views/index.php?error=none");