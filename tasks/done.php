<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("location: ../login/login.php?msg=$msg");
    exit;
}
?>
<head>
    <title>Completed pagina</title>
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
        <h1>Taken die klaar zijn</h1>
        
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken WHERE status='Klaar' ORDER BY deadline ASC";
            $statement = $conn->prepare($query);
            $statement->execute();
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
                    <td><?php echo "<a href='department.php?afdeling={$taak['afdeling']}'>{$taak['afdeling']}</a>"; ?></td>
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