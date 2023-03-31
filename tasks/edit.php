<!doctype html>
<html lang="nl">

<head>
    <title>Edit pagina</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <div class="container">
        <h1>Taken aanpassen</h1>

        <?php
        $id = $_GET['id'];
        require_once '../backend/conn.php';
        $query = "SELECT * FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([":id" => $id]);
        $melding = $statement->fetch(PDO::FETCH_ASSOC)
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
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"><?php echo $taak['beschrijving'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="titel">Afdeling:</label>
                <input type="text" name="titel" id="titel" class="form-input" value="<?php echo $taak['afdeling']; ?>">
            </div>
            <div class="form-group">
            <label for="status">Status:</label>
                <select name="status" id="status" value="<?php echo $taak['status'] ?>">
                    <option value="To Do">To Do</option>
                    <option value="Bezig">Bezig</option>
                    <option value="Klaar">Klaar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input" value="<?php echo $taak['deadline']; ?>">
            </div>

            <input type="submit" value="Taak opslaan">
        </form>
    </div>
</body>

</html>