<head>
    <title>Taak Pagina</title>
    <title></title>
    <?php require_once '../head.php'; ?>
</head>
<body>

    <div class="container">
        <div class="container1">
        <a href="../index.php">Home pagina &gt;</a>
        <a href="done.php">Klaar Pagina &gt;</a>
        <a href="create.php"><i class="fa-solid fa-circle-plus"></i> Nieuwe Taak &gt;</a>
    </div>
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken WHERE status!='Klaar'";
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