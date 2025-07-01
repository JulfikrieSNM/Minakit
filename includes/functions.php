<?php
// functions.php

function getDBConnection()
{
    return new PDO("mysql:host=localhost;dbname=minakit_db", "root", "", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    ]);
}

function registerUser($dbh, $fname, $mnumber, $email, $password)
{
    $hashedPassword = md5($password);
    $sql = "INSERT INTO tblusers (FullName, MobileNumber, EmailId, Password) 
            VALUES (:fname, :mnumber, :email, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname);
    $query->bindParam(':mnumber', $mnumber);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $hashedPassword);
    $query->execute();
    return $dbh->lastInsertId();
}

function userLogin($dbh, $email, $password)
{
    $hashedPassword = md5($password);
    $sql = "SELECT EmailId FROM tblusers WHERE EmailId = :email AND Password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $hashedPassword);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
