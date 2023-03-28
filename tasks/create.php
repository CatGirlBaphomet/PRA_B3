<head>
    <title></title>
    <?php require_once '../head.php'; ?>
</head>   
<body>
<div class="container">
        <h1>Nieuwe melding</h1>

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
                <label for="afdeling">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input">
            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling:</label>
                <input type="text" name="afdeling" id="afdeling" class="form-input">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-input">
            </div>
            <input type="submit" value="Verstuur melding">

        </form>
    </div>
</body>