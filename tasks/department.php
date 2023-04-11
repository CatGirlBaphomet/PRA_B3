<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("location: ../login/login.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Afdeling pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<header>
    <div class="container1">
        <img src="../img/logo-big-v4.png" alt="Logo van DeveloperLand">
        <a href="../index.php"><i class="fa-solid fa-house"></i> Home pagina</a>
        <a href="../tasks/index.php"><i class="fa-solid fa-list-check"></i> Taken Lijst</a>
        <a href="../tasks/done.php"><i class="fa-solid fa-check"></i> Voltooide Taken</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</header>

<body>
    <div class="container">
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            $afdeling = $_GET['afdeling'];
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken  WHERE LOWER(afdeling = :afdeling) AND status != 'Klaar' ORDER BY deadline ASC";
            $statement = $conn->prepare($query);
            $statement->execute([":afdeling" => $afdeling]);
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table>
            <tr>
                <th>titel</th>
                <th>beschrijving</th>
                <th>afdeling</th>
                <th>status</th>
                <th>deadline</th>
                <th>user</th>
            </tr>
            <?php foreach($taken as $taak): ?>
                <tr>
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                    <td><?php echo $taak['status']; ?></td>
                    <td><?php echo $taak['deadline']; ?></td>
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