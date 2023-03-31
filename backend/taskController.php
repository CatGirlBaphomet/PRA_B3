<?php
$action = $_POST['action'];

if($action == "create"){
    $titel = $_POST['titel'];
    if(empty($titel))
    {
        $errors[] = "Vul de title in.";
    }
    $beschrijving = $_POST['beschrijving'];
    if(empty($beschrijving))
    {
        $errors[] = "Vul een beschrijving in.";
    }
    $afdeling = $_POST['afdeling'];
    if(empty($afdeling))
    {
        $errors[] = "Vul de afdeling in.";
    }
    $status = $_POST['status'];
    if(empty($status))
    {
        $errors[] = "Vul de status in.";
    }
    $deadline = $_POST['deadline'];
    if(empty($deadline))
    {
        $errors[] = "Vul de deadline in.";
    }
    $user = $_POST['user'];
    if(!is_numeric($user))
    {
        $errors[] = "Vul een geledige user in.";
    }

    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    echo $titel . " / " . $beschrijving . " / " . $afdeling . " / " . $status . " / " . $deadline . " / " . $user;

    require_once 'conn.php';

    $query="INSERT INTO taken(titel, beschrijving, afdeling, status, deadline, user) VALUES(:titel, :beschrijving, :afdeling, :status, :deadline, :user)";


    $statement=$conn->prepare($query);

    $statement->execute([
        ":titel"=>$titel,
        ":beschrijving"=>$beschrijving,
        "afdeling"=>$afdeling,
        ":status"=>$status,
        ":deadline"=>$deadline,
        ":user"=>$user,
    ]);

header("Location: ../tasks/index.php?msg=Taak opgeslagen");
}