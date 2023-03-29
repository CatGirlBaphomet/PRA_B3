<head>
    <title>Create pagina</title>
    <?php require_once '../head.php'; ?>
</head>   
<body>
<div class="container">
        <h1>Nieuwe Taak</h1>

        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input">
            </div>
            <div class="form-group">
                <label for="beschrijving">Overige:</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>

            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling:</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input">
            </div>
            <div class="form-group">
            <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value=""> - Wat is de status - </option>
                    <option value="To Do">todo</option>
                    <option value="Bezig">bezig</option>
                    <option value="Klaar">klaar</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline" class="form-input">
            </div>
            <div class="form-group">
                <label for="user">User:</label>
                <input type="text" name="user" id="user" class="form-input">
            </div>
            <input type="submit" value="Verstuur taak">

        </form>
    </div>
</body>