<?php

include('./../../protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
  </head>
  <body>

    <div class="wrapper">
      <div class="top">
        <h1>Biblioteca WRA - Funcionários (ADMIN).</h1>
      </div>

      <nav role='navigation'>
        <ul>
          <li><a class="tablink ativo" href="../../inicio.php">Voltar</a></li>
          <li><a class="tablink" href="?page=novo">Cadastrar Func.</a></li>
          <li><a class="tablink" href="?page=default">Listar Func.</a></li>
        </ul>
      </nav>

      <div class="tab">
        <?php
          include("../../conexao.php");

          switch(@$_REQUEST["page"]){
            case 'novo':
              include("novo-func.php");
              break;
            case 'salvar':
              include("salvar-func.php");
              break;
            case 'editar':
              include("editar-func.php");
              break;
            default:
              include("listar-func.php");
          }
        ?>
      </div>

    <div class="footer">
    <b>Todos os direitos reservados</b><br>
      Escola Walter Ramos de Araújo - Av. Prefeito Mauricio Brasileiro s/n, CE - Brasil - 2023<br>
      <a href="mailto: walter@ramos.com">walter@ramos.com</a> 
    </div>

    <script src="../../js/script.js" ></script>
  </body>
</html>
