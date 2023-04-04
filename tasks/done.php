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
<body>
    
    <div class="container">
        <div class="container1">
            <a href="../index.php">Home pagina &gt;</a>
    <a href="index.php">To-Do pagina &gt;</a>
    </div>
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
            <th>deadline</th>
        </tr>
        <?php foreach($taken as $taak){ ?>
                <tr>
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                    <td><?php echo $taak['deadline']; ?></td>
                </tr>
        <?php } ?>
    </table>
    </div>  
</body>