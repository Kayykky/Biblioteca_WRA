<?php

include('./../../protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Empréstimos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
  </head>
  <body>

    <div class="wrapper">
      <div class="top">
        <h1>Biblioteca WRA - Empréstimos</h1>
      </div>

      <nav role='navigation'>
        <ul>
          <li><a class="tablink ativo" href="../../inicio.php">Voltar</a></li>
          <li><a class="tablink" href="?page=novo">Cadastrar Empréstimo</a></li>
          <li><a class="tablink" href="?page=default">Listar Empréstimos</a></li>
          <li><a class="tablink" href="?page=historico">Histórico</a></li>
        </ul>
      </nav>

      <div class="tab">
        <?php
          include("../../conexao.php");

          switch(@$_REQUEST["page"]){
            case 'novo':
              include("novo-emp.php");
              break;
            case 'salvar':
              include("salvar-emp.php");
              break;
            case 'validar':
              include("validar-emp.php");
              break;
            case 'historico':
              include("historico-emp.php");
              break;
            default:
              include("listar-emp.php");
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
