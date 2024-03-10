<?php 
session_start();
session_unset();
session_destroy();

header("Location: /Products-Crud-OOP/OOP-Login/index.php");