<!doctype html>
<html lang="nl">

<head>
    <title>Afdeling pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <div class="container">
        <div class="container1">
            <a href="index.php"><i class="fa-regular fa-arrow-turn-down-left"></i> Terug</a>
        </div>
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