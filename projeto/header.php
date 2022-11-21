<?php
session_start();

if($_SESSION["idAtendente"] == null) {
    header("Location: index.php");
}

?>
<section>
    <nav>
      <ul class="menuItems">
        <li><a href='home.php'>Home</a></li>
        <li><a href='listClient.php'>Clientes</a></li>
            <?php
            if($_SESSION['cargo'] == 'administrador') {
            ?>
            <li><a href='listAttendant.php'>Atendentes</a></li>

            <?php
            }
        ?>
        <li><a href='#'>Agendamentos</a></li>
        <li><a href='notes.php'>Notas</a></li>
        <li><a href='#'>Catálogos</a></li>
        <li><a href='listService.php'>Serviços</a></li>
        <li><a href='logout.php'>Sair</a></li>
      </ul>
    </nav>
  </section>