<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("location: ../login.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Afdeling pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<?php require_once '../header.php'?>

<body>
    <div class="container">
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            $user = $_SESSION['user_id'];
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken  WHERE user = :user";
            $statement = $conn->prepare($query);
            $statement->execute([':user' => $user]);
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table>
            <tr>
                <th>titel</th>
                <th>beschrijving</th>
                <th>afdeling</th>
                <th>status</th>
                <th>deadline</th>
                <th>kleur</th>
                <th>user</th>
            </tr>
            <?php foreach($taken as $taak): ?>
                <tr>
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                    <td><?php echo $taak['status']; ?></td>
                    <td><?php echo $taak['deadline']; ?></td>
                    <td><?php echo $taak['color']; ?></td>
                    <td><?php echo $taak['user']; ?></td>
                    <td class="edit">
                        <?php echo "<a href='edit.php?id={$taak['id']}'>" ?>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>  
</body>