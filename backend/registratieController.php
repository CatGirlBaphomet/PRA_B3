<?php
$action = $_POST['action'];
if($action == "registreren")
    $username = $_POST['username'];
    if(empty($username))
    {
        $errors[] = "Vul een gebruikersnaam in.";
    }
    $password = $_POST['password'];
    if(empty($password))
    {
        $errors[] = "Vul een wachtwoord in.";
    }
    if($username == $username || $username == $naam)
    {
        $errors[] = "Een account met deze naam bestaat al, kies alstublieft een andere naam.";
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);  
    
    require_once 'conn.php';

    $query="INSERT INTO users(username, password, naam) VALUES(:username, :password, :naam)";


    $statement=$conn->prepare($query);

    $statement->execute([
        ":username"=>$username,
        ":password"=>$hashed_password,
        ":naam"=>$username,
    ]);


    header("location: ../index.php?");
?>
