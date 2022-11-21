<?php
$ok = false;
if (isset($_POST["cadastrar"])) {
    include("connection.php");
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $valor = isset($_POST["valor"]) ? $_POST["valor"] : "";

    if ($nome != "" && $valor != "") {
        $sql  = "INSERT INTO servico(idServico, nome, valor) VALUES (null, ? , ?)";
        $stmt = $connection->prepare($sql);
        $ok = $stmt->execute([$nome, $valor]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
    include 'head.php';
?>

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
                <h1>Serviço</h1>
                <form 
                    method="POST" 
                    style="width:100%;">
                    <div class="texto">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Manicure" required>
                    </div>
                    <div class="texto">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" step="0.2" placeholder="50" required>

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
                text: 'Serviço cadastrado com sucesso!',
            })
        </script>
    <?php
    }
    ?>
</body>

</html>