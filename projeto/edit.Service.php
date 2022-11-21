<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Editar servico</title>
</head>

<?php
include "connection.php";

$idServico = isset($_GET["idServico"]) ? $_GET['idServico'] : "";

if(!is_numeric($idServico)) {
    // Não é um ID Valido =D
    header("Location: listServico.php");
}

$stmt = $connection->prepare("SELECT * FROM servico WHERE idServico=:id");
$stmt->bindParam(":id", $idServico);
$stmt->execute();

$servico = $stmt->fetch();
if($servico){
    $nome = $servico["nome"];
    $valor = $servico["valor"];
}else {
    // O Cliente não existe =D
    header("Location: listService.php ");
}

if (isset($_POST["enviar"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $valor = isset($_POST["valor"]) ? $_POST["valor"] : "";


    $mysql_query = "UPDATE servico SET nome='{$nome}', valor='{$valor}' WHERE idServico={$idServico}";
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
                    <h1>ATUALIZAR SERVIÇO</h1>
                    <form method="POST" style="width:100%;">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <div class="texto">
                            <label for="nome">Nome</label>
                            <input type="text" value="<?=$nome?>" name="nome" id="nome" placeholder="Maquiagem artistica" required>
                        </div>
                        <div class="texto">
                            <label for="valor">Valor</label>
                            <input type="number" value="<?=$valor?>" name="valor" id="valor" step=".02" placeholder="109.99" required>
                        </div>
                        <button class="btn-padrao" value="enviar" name="enviar">Alterar</button>
                    </form>
                </div>
            </div>
</div>