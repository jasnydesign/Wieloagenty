<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "wieloagenty";
/****************************************************** 
* connection.php 
* konfiguracja połączenia z bazą danych 
******************************************************/ 


    // serwer 
    $mysql_server = "localhost"; 
    // admin 
    $mysql_admin = "root"; 
    // hasło 
    $mysql_pass = ""; 
    // nazwa baza 
    $mysql_db = "wieloagenty"; 
    // nawiązujemy połączenie z serwerem MySQL 
    $con = @mysql_connect($mysql_server, $mysql_admin, $mysql_pass) 
    or die('Brak połączenia z serwerem MySQL.'); 
    // łączymy się z bazą danych 
    @mysql_select_db($mysql_db) 
    or die('Błąd wyboru bazy danych.'); 
?>