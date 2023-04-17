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
    <title>Create pagina</title>
    <?php require_once '../head.php'; ?>
</head>   

<?php require_once '../header.php'?>

<body>
<div class="container">
    <div class="container1">
    <a href="index.php"><i class="fa-regular fa-arrow-turn-down-left"></i> Terug</a>
    </div>
        <h1>Nieuwe Taak</h1>

        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input">
            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>

            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling:</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input">
            </div>
            <div class="form-group">
            <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="To Do">To Do</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input">
            </div>
            <div class="form-group">
            <label for="color">Kleur:</label>
                <select name="color" id="color">
                    <option value="-Kies een kleur-">-Kies een kleur-</option>
                    <option value="rood">Rood</option>
                    <option value="blauw">Blauw</option>
                    <option value="groen">Groen</option>
                    <option value="geel">Geel</option>
                    <option value="oranje">Oranje</option>
                    <option value="paars">Paars</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user">User:</label>
                <input type="text" name="user" id="user" class="form-input" value="<?php echo $_SESSION['user_id']; ?>" readonly>
            </div>
            <input type="submit" value="Verstuur taak">

        </form>
    </div>
</body>