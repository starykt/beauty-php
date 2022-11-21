<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Editar cliente</title>
</head>

<?php
include "connection.php";

$idCliente = isset($_GET["idCliente"]) ? $_GET['idCliente'] : "";

if(!is_numeric($idCliente)) {
    // Não é um ID Valido =D
    header("Location: listClient.php");
}

$stmt = $connection->prepare("SELECT * FROM cliente WHERE idCliente=:id");
$stmt->bindParam(":id", $idCliente);
$stmt->execute();

$cliente = $stmt->fetch();
if($cliente){
    $nome = $cliente["nome"];
    $cpf = $cliente["cpf"];
    $endereco = $cliente["endereco"];
    $telefone = $cliente["telefone"];
}else {
    // O Cliente não existe =D
    header("Location: listClient.php ");
}

if (isset($_POST["enviar"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : "";
    $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : "";
    $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : "";

    $mysql_query = "UPDATE cliente SET nome='{$nome}', cpf='{$cpf}',  endereco='{$endereco}',telefone='{$telefone}' WHERE idCliente={$idCliente}";
    $stmt = $connection->prepare($mysql_query);
    $stmt->execute();
}
// Connection Close	
?>
<?php
include "head.php";
?>

<body class="wave" style=" width: 100%;
        height: 100%;">
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
                    <h1>ALTERAR CLIENTE</h1>
                    <form method="POST" style="width:100%;">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <div class="texto">
                            <label for="nome">Nome</label>
                            <input type="text" value="<?=$nome?>" name="nome" id="nome" placeholder="Bruna Alves" required>
                        </div>
                        <div class="texto">
                            <label for="cpf">CPF</label>
                            <input type="text" value="<?=$cpf?>" name="cpf" id="cpf" placeholder="333.123.456-01" required>
                        </div>
                        <div class="texto">
                            <label for="endereco">Endereço</label>
                            <input type="text" value="<?=$endereco?>" name="endereco" id="endereco" placeholder="Rua Brasil 45" required>
                        </div>
                        <div class="texto">
                            <label for="telefone">Telefone</label>
                            <input type="tel" value="<?=$telefone?>" name="telefone" id="telefone" placeholder="(18) 99234-5679" required>

                        </div>
                        <button class="btn-padrao" value="enviar" name="enviar">Alterar</button>
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