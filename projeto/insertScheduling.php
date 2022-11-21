<?php
$ok = false;
include("connection.php");
if (isset($_POST["cadastrar"])) {
   
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="wave" style=" width: 100%;
        height: 100%;">
    <?php
    include "header.php";
    ?>
    <div style="width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;">
        <div class="direita-login">
            <div class="telinha">
                <h1> Notas </h1>
                <form method="POST" style="width:100%;">
                    <div class="texto">
                        <label for="data">Data</label>
                        <input type="date" name="date" id="date" placeholder="01/01/2001" required>
                    </div>
                    <div class="texto">
                    <label for="cliente">Cliente</label>
                        <select name="cliente" id="cliente">
                            <?php
                                $stmt = $connection->prepare("SELECT * FROM cliente");
                                $stmt->execute();
                                foreach($stmt->fetchAll() as $row) {
                                    ?>
                                    <option value='<?=$row["idCliente"]?>'><?=$row["nome"]?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                   
                    <button class="btn-padrao" value="cadastrar" name="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <?php

    if ($ok) {
    ?>
        <script>
            // success error warning info question
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Nova nota adicionada',
            })
        </script>
    <?php
    }

    ?>


</body>

</html>