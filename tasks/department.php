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
            $afdeling = $_GET['afdeling'];
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken  WHERE LOWER(afdeling = :afdeling) AND status != 'Klaar' ORDER BY deadline ASC";
            $statement = $conn->prepare($query);
            $statement->execute([":afdeling" => $afdeling]);
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <form method="POST" action="../backend/taskController.php">
            <input type="hidden" name="action" value="editStatus">
            <input type="hidden" name="id" value="<?php echo $id?>">
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
                    <td><select name="status" id="status">
                        <option value="To Do" <?php if($taak['status']=="To Do") echo 'selected="selected"'; ?>>To Do</option>
                        <option value="Bezig" <?php if($taak['status']=="Bezig") echo 'selected="selected"'; ?>>Bezig</option>
                        <option value="Klaar" <?php if($taak['status']=="Klaar") echo 'selected="selected"'; ?>>Klaar</option>
                    </select></td>
                    <td><?php echo $taak['deadline']; ?></td>
                    <td><?php echo $taak['color']; ?></td>
                    <td><?php echo $taak['user']; ?></td>
                    <td class="edit">
                        <i class="fa-solid fa-circle"></i>
                    </div>
                    <td class="edit">
                        <?php echo "<a href='edit.php?id={$taak['id']}'>" ?>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div class="editStatus">
                <input type="submit" value="Status Bijwerken" id="button">
            </div>
        </form>
    </div>  
</body>