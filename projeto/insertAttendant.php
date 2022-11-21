<?php
$ok = false;
if (isset($_POST["cadastrar"])) {
    include("connection.php");
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
    $cargo = isset($_POST["cargo"]) ? $_POST["cargo"] : "";
    $dataNasc = isset($_POST["dataNasc"]) ? $_POST["dataNasc"] : "";
    $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = md5(isset($_POST["senha"]) ? $_POST["senha"] : "");
 


    if ($nome != "" && $cpf != "" && $endereco != "" && $email != "" && $senha != "" && $cargo != "" && $dataNasc != "") {
        $sql  = "INSERT INTO atendente(idAtendente, nome, cpf, cargo, dataNasc, endereco, email, senha) VALUES (null, ? , ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $ok = $stmt->execute([$nome, $cpf,  $cargo,$dataNasc, $endereco, $email, $senha]);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="wave" style="height: 70vw;">
    <?php
    include "header.php";
    ?>
    <form method="post">
    <div style="width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;">
        <div class="direita-login">
            <div class="telinha">
                <h1>ATENDENTE</h1>
                <form method="POST" style="width:100%;">
                    <div class="texto">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Bruna Alves" required>
                    </div>
                    <div class="texto">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="333.123.456-01" required> <br>
                    </div>
                    <div class="texto">
                        <label for="dataNasc">Data Nascimento</label>
                        <input type="date" name="dataNasc" id="dataNasc" placeholder="(18) 99234-5679" required>
                    </div>
                    <div class="texto">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required>
                    </div>
                    <div class="texto">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="texto">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Avenida Brasil, 128" required> <br>
                        <label for="cargo">Cargo</label>
                    </div>
                    <div class="radio">
                        <input type="radio" id="adm" name="cargo" value="administrador">
                        <label for="adm">Administrador</label>
                        <label for="atd">Atendente</label>
                        <input type="radio" id="atd" name="cargo" value="atendente">
                    </div>
                    <button class="btn-padrao" value="cadastrar" name="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#cpf").mask("000.000.000-00");
        $("#telefone").mask("(00) 00000-0000")
    </script>

    <?php

    if ($ok) {
    ?>
        <script>
            // success error warning info question
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Cliente cadastrado com sucesso!',
            })
        </script>
    <?php
    }

    ?>


</body>

</html>