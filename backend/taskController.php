<?php
$action = $_POST['action'];

if($action == "create"){
    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];
    $user = $_POST['user'];

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