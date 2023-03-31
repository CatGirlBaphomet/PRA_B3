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
    </div>
</body>

</html>