<head>
    <title>Completed pagina</title>
    <?php require_once '../head.php'; ?>
</head>
<body>
    
    <div class="container">
        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <?php
            require_once '../backend/conn.php';
            $query = "SELECT * FROM taken";
            $statement = $conn->prepare($query);
            $statement->execute();
            $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
    <table>
        <tr>
            <th>titel</th>
            <th>beschrijving</th>
            <th>afdeling</th>
        </tr>
        <?php foreach($taken as $taak){ ?>
            <?php if ($taak['status'] == "Klaar"){ ?>
                <tr>
                    <td><?php echo $taak['titel']; ?></td>
                    <td><?php echo $taak['beschrijving']; ?></td>
                    <td><?php echo $taak['afdeling']; ?></td>
                </tr>
            <?php }?>
        <?php } ?>
    </table>
    </div>  
</body>