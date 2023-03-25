<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Biblioteca WRA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
  <div class="top">
    <h1>Biblioteca WRA</h1>
  </div>
  
  <nav role='navigation'>
    <ul>
      <li><a class="tablink ativo" href="index.php">Voltar</a></li>
    </ul>
  </nav>
  
  <div class="tab">
    <fieldset>
      <?php
        include('conexao.php');

        if(isset($_POST['login']) || isset($_POST['senha'])) {

            if(strlen($_POST['login']) == 0) {
                echo "Preencha seu login";
            } else if(strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            } else {

                $login = $conn->real_escape_string($_POST['login']);
                $senha = $conn->real_escape_string($_POST['senha']);

                $sql_code = "SELECT * FROM funcionario WHERE login = '$login' AND senha = '$senha'";
                $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

                $qtd = $sql_query->num_rows;

                if($qtd == 1) {
            
                    $usuario = $sql_query->fetch_assoc();

                    if(!isset($_SESSION)) {
                        session_start();
                    }

                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];

                    header("location: inicio.php");

                } else {
                    echo "Falha ao logar! Login ou senha incorretos";
                }

            }

        }
      ?>
      <h1>Acesso restrito</h1><br>
      <form action="" method="POST">
          <label>Login:</label><br>
          <input type="text" name="login"><br><br>

          <label>Senha:</label><br>
          <input type="password" id="senha" name="senha"><br><br>

          <button type="submit" class="button3">Entrar</button>

    </form>
    </fieldset>
    
    <div class="callout">
      <h1>Área de administradores.</h1>
    </div>
  </div>
  
<div class="footer">
  <b>Todos os direitos reservados</b><br>
    Escola Walter Ramos de Araújo - Av. Prefeito Mauricio Brasileiro s/n, CE - Brasil - 2023<br>
    <a href="mailto: walter@ramos.com">walter@ramos.com</a> 
</div>
<!-- partial -->
  <script  src="js/script.js"></script>

</body>
</html>
