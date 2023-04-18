<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];


//1. Haal gegevens van gebruiker op, aan de hand van email/username

//   Vijfstappenplan:

//      1. Haal de verbinding

require_once 'conn.php';
$query = "SELECT * FROM users WHERE username = :username";
$statement = $conn ->prepare($query);
$statement -> execute([":username" => $username]);
$user = $statement -> fetch(PDO::FETCH_ASSOC);





//2. Check of je een resultaat krijgt (anders: account bestaat niet)

//   If-statement, check of "$statement->rowCount()" kleiner is dan 1




if ($statement -> rowCount() < 1)
{
    die("error: account bestaat niet");
}

if (!password_Verify($password, $user['password']))
{
    die("error: wachtwoord niet juist");
}

$_SESSION['user_id'] = $user['id'];

$_SESSION['user_name'] = $user['naam'];

header("location: ../index.php?");

