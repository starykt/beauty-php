<?php
$ok = false;
if (isset($_POST["cadastrar"])) {
    include("connection.php");
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
    $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : "";
    $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";


    if ($nome != "" && $cpf != "" && $endereco != "" && $telefone != "") {
        $sql  = "INSERT INTO cliente(idCliente, nome, cpf, endereco, telefone) VALUES (null, ? , ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $ok = $stmt->execute([$nome, $cpf, $endereco, $telefone]);
    }
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
                <h1><a href="listClient.php" style="color:#2F195F; text-decoration: none;"> Notas</a></h1>
                <form method="POST" style="width:100%;">
                    <div class="texto">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Bruna Alves" required>
                    </div>
                    <div class="texto">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="333.123.456-01" required>
                    </div>
                    <div class="texto">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Rua Brasil 45" required>
                    </div>
                    <div class="texto">
                        <label for="telefone">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" placeholder="(18) 99234-5679" required>

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