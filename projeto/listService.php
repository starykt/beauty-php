<?php
require_once('connection.php');
$consulta = $connection->query("SELECT idServico, nome, valor FROM servico;");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
</head>
<?php
include "head.php";
?>

<body
  class="wave"
  style="text-align: center;">
  <?php
    include "header.php";
  ?>
  <div
    class="telinha"
    style="display: inline-block;"
    >
      <div class="total-opcoes">
        <a
          href="insertService.php">
          <button
            type="button"
            class="btn-cadastrar">
              Novo Serviço
          </button>
        </a>
        <input
          type="text"
          id="search"
          name="search"
          placeholder="Buscar  ">
    </div> <br>

    <h4>Serviços</h4> <br>

    <div
      class="tabelinha">
    <table id="table">
      <tr class="table-title">
        <td>Serviço</td>
        <td>Valor</td>
        <td>Ações</td>
      </tr>
      <?php while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr></tr>
        <td><?php echo $linha['nome']; ?></td>
        <td><?php echo $linha['valor']; ?></td>
        <td>
          <a href="edit.Service.php?idServico=<?php echo $linha['idServico'];?>"> 
          <button type="button" class="btn-editar">Editar</button></a>
          <button type="button" class="btn-excluir" onclick="excluir(<?php echo $linha['idServico']; ?>)">Excluir</button>
        </td>
        </tr>
      <?php } ?>
    </table>
  </div>
  <script>
    function excluir(id) {
      Swal.fire({
        title: 'Tem certeza?',
        text: "Excluir esse servico é uma ação irreverssivel!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Não",
        confirmButtonText: 'Sim!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `deleteService.php?idServico=${id}`;
        }
      })
    }

    $("#search").keyup(function() {
      var value = this.value.toLowerCase().trim();
      $("#table tr").each(function(index) {
        if (!index) return;
        $(this).find("td").each(function() {
          var id = $(this).text().toLowerCase().trim();
          var not_found = (id.indexOf(value) == -1);
          $(this).closest('tr').toggle(!not_found);
          return not_found;
        });
      });
    })
  </script>
</body>

</html>