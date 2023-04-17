<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("location: ../login.php?msg=$msg");
    exit;
}
?>
<head>
    <title>Taak Pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<?php require_once '../header.php'?>

<body>
    <div class="container">
        <h1>Taken Lijst</h1>
        <div class="create">
            <a href="create.php"><i class="fa-solid fa-circle-plus"></i> Nieuwe Taak</a>
        </div>
    </div>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken WHERE status!='Klaar' ORDER BY deadline ASC";
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
                <th>kleur</th>
                <th>user</th>
            </tr>
        <?php foreach($taken as $taak): ?>
            <tr>
                <td><?php echo $taak['titel']; ?></td>
                <td><?php echo $taak['beschrijving']; ?></td>
                <td><?php echo "<a href='department.php?afdeling={$taak['afdeling']}'>{$taak['afdeling']}</a>"; ?></td>
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