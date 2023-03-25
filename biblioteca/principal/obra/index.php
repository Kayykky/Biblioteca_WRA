<?php

include('./../../protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Obras&Acervo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.ico">
  </head>
  <body>

    <div class="wrapper">
      <div class="top">
        <h1>Biblioteca WRA - Obras&Acervo</h1>
      </div>

      <nav role='navigation'>
        <ul>
          <li><a class="tablink ativo" href="../../inicio.php">Voltar</a></li>
          <li><a class="tablink" href="?page=novo">Cadastrar Obra</a></li>
          <li><a class="tablink" href="?page=listarObra">Listar Obra</a></li>
          <li><a class="tablink" href="?page=default">Listar Acervo</a></li>
        </ul>
      </nav>

      <div class="tab">
        <?php
          include("../../conexao.php");

          switch(@$_REQUEST["page"]){
            case 'novo':
              include("novo-obra.php");
              break;
            case 'listarObra':
              include("listar-obra.php");
              break;;
            case 'salvar':
              include("salvar-obra.php");
              break;
            case 'editar':
              include("editar-obra.php");
              break;
            default:
              include("listar-acervo.php");
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
