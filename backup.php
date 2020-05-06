

<?php
ob_start();
session_start();
        include"connect.php";

    BACKUP DATABASE reception
TO DISK = 'D:\tana\testDB.sql'
WITH DIFFERENTIAL; 

ob_end_flush();
?>