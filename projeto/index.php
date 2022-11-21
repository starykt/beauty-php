<?php
session_start();

if (isset($_SESSION["idAtendente"])) {
    header("Location:home.php");
} // Verifica se foi feito login


if(isset($_POST)){ 
    include("connection.php");
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
      // varivel = condicao ? valor verdadeiro : valor falso;

    if($email != "" && $senha != "") {

        // Prepara o SELECT
        $stmt = $connection->prepare("SELECT * FROM atendente WHERE email=:email AND senha=md5(:senha)"); // "=?" para 
        $stmt->bindParam(':email', $email);                                                         // evitar que manipulem senha.
        $stmt->bindParam(':senha', $senha);                                                         // evitar que manipulem senha.
        $stmt->execute();
        $user = $stmt->fetch();
        // fetch = Buscar

        if (isset($user["idAtendente"])){
            $_SESSION["idAtendente"] = $user["idAtendente"];
            $_SESSION["cargo"] = $user["cargo"];
            $_SESSION["nome"] = $user["nome"];
            echo "OK";
            header("Location:home.php");
        } else {
            echo "Login ou senha incorretos.";
        } 
        
        
    }
    
  
   
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <div class="total">
    <div class="direita-login">
      <div class="telinha">
        <h1>LOGIN</h1>
        <form method="POST" style="width:100%;">
          <div class="texto">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
          </div>
          <div class="texto">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>
          <input id="botao" type="submit" class="btn-padrao" value="Login">
        </form>
      </div>
    </div>
  </div>
</body>
</html>