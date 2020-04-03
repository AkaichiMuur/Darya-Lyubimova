<?php
session_start();

if (empty($_SESSION['username'])) 
{
    header('Location: main.php');
    exit();
}
?> 