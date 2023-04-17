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
    $color = $_POST['color'];
    if(empty($color))
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
        echo "Je hebt de volgende errors: \n";
        foreach ($errors as $error)
        {
            echo "<pre>";
            echo $error,"\r\n";
            echo "</pre>";
        }
        die();
    }

    echo $titel . " / " . $beschrijving . " / " . $afdeling . " / " . $status . " / " . $deadline . " / " . $color . " / " . $user;

    require_once 'conn.php';

    $query="INSERT INTO taken(titel, beschrijving, afdeling, status, deadline, color, user) VALUES(:titel, :beschrijving, :afdeling, :status, :deadline, :color, :user)";


    $statement=$conn->prepare($query);

    $statement->execute([
        ":titel"=>$titel,
        ":beschrijving"=>$beschrijving,
        "afdeling"=>$afdeling,
        ":status"=>$status,
        ":deadline"=>$deadline,
        ":color"=>$color,
        ":user"=>$user,
    ]);

header("Location: ../tasks/index.php?msg=<em>Taak opgeslagen</em>");
}
if($action == "edit")
{
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
    if(isset($errors))
    {
        echo "Je hebt de volgende errors: \n";
        foreach ($errors as $error)
        {
            echo "<pre>";
            echo $error,"\r\n";
            echo "</pre>";
        }
        die();
    }

    $titel = $_POST['titel'];
    $beschrijving = $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];
    $color = $_POST['color'];
    $user = $_POST['user'];
    $id = $_POST['id'];

    require_once 'conn.php';
    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline, color = :color, user = :user WHERE id = :id";
    
    $statement = $conn->prepare($query);
    
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":color" => $color,
        ":user"=>$user,
        ":id" => $id
    ]);

    header("Location:../tasks/index.php?msg=<em>Taak geüpdatet</em>");
}
if($action == "editStatus")
{
    $status = $_POST['status'];

    require_once 'conn.php';
    $query = "UPDATE taken SET status = :status";
    
    $statement = $conn->prepare($query);
    
    $statement->execute([
        ":status" => $status,
    ]);

    header("Location:../tasks/index.php?");
}
if($action == "delete")
{
    $id = $_POST['id'];

    require_once 'conn.php';
    $query = "DELETE FROM taken WHERE id = :id";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":id" => $id
    ]);

    header("Location:../tasks/index.php?msg=<em>Taak verwijderd</em>");
}
?>