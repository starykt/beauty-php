<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Menu</title>
</head>

<body>
  <div class="total-login">
    <div class="direita-login">
      <div class="telinha-login">
        <h1>LOGIN</h1>
        <form method="POST" style="width:100%;">
          <div class="texto">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
          </div>
          <div class="texto">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
          </div>
          <input id="botao" type="submit" class="btn-login" value="Login">
        </form>
      </div>
    </div>
  </div>
</body>
</html>