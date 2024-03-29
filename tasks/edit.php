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
    <title>Edit pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<?php require_once '../header.php'?>

<body>
    <div class="container">
    <div class="container1">
    <a href="index.php"><i class="fa-regular fa-arrow-turn-down-left"></i> Terug</a>
    </div>

        <h1>Taken aanpassen</h1>

        <?php
        $id = $_GET['id'];
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([":id" => $id]);
        $taak = $statement->fetch(PDO::FETCH_ASSOC)
        ?>

        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input" value="<?php echo $taak['titel']; ?>">
            </div>
            <div class="form-group">
                <label for="titel">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"><?php echo $taak['beschrijving']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="titel">Afdeling:</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input" value="<?php echo $taak['afdeling']; ?>">
            </div>
            <div class="form-group">
            <label for="status">Status:</label>
                <select name="status" id="dropdown">
                    <option value="To Do" <?php if($taak['status']=="To Do") echo 'selected="selected"'; ?>>To Do</option>
                    <option value="Bezig" <?php if($taak['status']=="Bezig") echo 'selected="selected"'; ?>>Bezig</option>
                    <option value="Klaar" <?php if($taak['status']=="Klaar") echo 'selected="selected"'; ?>>Klaar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input" value="<?php echo $taak['deadline']; ?>">
            </div>

            <div class="form-group">
            <label for="color">Kleur:</label>
                <select name="color" id="dropdown">
                    <option value="rood" <?php if($taak['color']=="rood") echo 'selected="selected"'; ?>>Rood</option>
                    <option value="blauw" <?php if($taak['color']=="blauw") echo 'selected="selected"'; ?>>Blauw</option>
                    <option value="groen" <?php if($taak['color']=="groen") echo 'selected="selected"'; ?>>Groen</option>
                    <option value="geel" <?php if($taak['color']=="geel") echo 'selected="selected"'; ?>>Geel</option>
                    <option value="oranje" <?php if($taak['color']=="oranje") echo 'selected="selected"'; ?>>Oranje</option>
                    <option value="paars" <?php if($taak['color']=="paars") echo 'selected="selected"'; ?>>Paars</option>
                    <option value="geen" <?php if($taak['color']=="geen") echo 'selected="selected"'; ?>>Geen</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user">User:</label>
                <input type="text" name="user" id="user" class="form-input" value="<?php echo $taak['user']; ?>">
            </div>
            <input type="submit" value="Taak opslaan" id="button">
        </form>
        <div class="delete">
            <form action="../backend/taskController.php" method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Verwijderen" id="button">
            </form>
        </div>
    </div>
</body>
</html>