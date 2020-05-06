 <?php
 session_start();
session_unset($_SESSION['user_name']);
session_unset($_SESSION['user_password']);
session_unset($_SESSION['full_name']);
session_unset($_SESSION['user_slahia']);
session_unset($_SESSION['user_status']);


echo "done";

 ?>