<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Notas</title>
    <style>
        .nota {
            border: 1px solid black;
        }
    </style>
</head>
<?php
include "head.php";
?>

<body class="wave" style="text-align: center;">
    <?php
    include "header.php";


    require_once('connection.php');
    $idAtendente = $_SESSION["idAtendente"];
    $consulta = $connection->prepare("SELECT idNota, nome, descricao, idAtendente FROM notas WHERE idAtendente=:id");
    $consulta->bindParam(":id", $idAtendente);
    $consulta->execute();
    ?>
    <br>
    <div>
        <a href="InsertNotes"> <button style="width:300px;">Adicionar nota</button></a>

        <div class="container">
            <div class="row ">
                <?php
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="col-md-4 nota">
                        <?php echo $linha['nome']; ?><br>
                        <?php echo $linha['descricao']; ?><br>
                        <?php echo $linha['idAtendente'] ?> <br>

                    </div>
                <?php
                } ?>
            </div>
        </div>


    </div>
</body>

</html>