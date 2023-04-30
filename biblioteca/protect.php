<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Acesso negado</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>
<div class="wrapper">
    <fieldset>
        <?php
            if(!isset($_SESSION)) {
                session_start();
            }

            if(!isset($_SESSION['id'])) {
                echo "<div class='protect'>Você não pode acessar esta página porque não está logado. <br><br>
                <button onclick=\"location.href='index.php'\" class='button3'>Entrar</button></div>";
                exit(); 
            }
        ?>
    </fieldset>
</div>

</body>
</html>
