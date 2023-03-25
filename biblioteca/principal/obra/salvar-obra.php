<?php  
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
		    $ext = strtolower(substr($_FILES['capa']['name'],-4)); //Pegando extensão do arquivo
		    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
		    $dir = '../../assets/capas/'; //Diretório para uploads
		 
		    move_uploaded_file($_FILES['capa']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
		     
		    $titulo = $_POST['titulo'];
		    $autor = $_POST['autor'];
		    $genero = $_POST['genero'];
		    $editora = $_POST['editora'];
		    $edicao = $_POST['edicao'];
		    $quant = $_POST['quant'];
		            
		    $sql = "INSERT INTO obra (titulo, autor, genero, editora, edicao, capa) VALUES ('{$titulo}', '{$autor}', '{$genero}', '{$editora}', '{$edicao}', '{$new_name}')";
		    $res = $conn->query($sql);


			$sql = "SET @id_obra = LAST_INSERT_ID()";
			$res = $conn->query($sql);

			$copias_inseridas = 0;
			while ($copias_inseridas < $quant) {
			    $sql = "INSERT INTO acervo (id_obra, status) VALUES (@id_obra, 'Livre')";
			    $res = $conn->query($sql);
			    $copias_inseridas++;
			}


			if ($copias_inseridas == $quant) {
				print "<script>alert('Cadastrado');</script>";
				print "<script>location.href='?page=listarObra';</script>;";
			} else{
				print "<script>alert('ERROR');</script>";
				print "<script>location.href='?page=listarObra';</script>;";
			}
			break;

		case 'editar':
			$titulo = $_POST['titulo'];
			$autor = $_POST['autor'];
			$editora = $_POST['editora'];
			$edicao = $_POST['edicao'];

			$sql = "UPDATE obra SET 
						titulo='{$titulo}',
						autor='{$autor}',
						editora='{$editora}',
						edicao='{$edicao}'
					WHERE id=".$_REQUEST['id'];

			$res = $conn->query($sql);

			if ($res==true) {
				print "<script>alert('Editado');</script>";
				print "<script>location.href='?page=default';</script>;";
			} else{
				print "<script>alert('ERROR');</script>";
				print "<script>location.href='?page=default';</script>;";
			}
			break;

		case 'excluir':
			
			$sql = "DELETE FROM acervo WHERE id =".$_REQUEST['id'];

			$res = $conn->query($sql);

			if ($res==true) {
				print "<script>alert('Deletado');</script>";
				print "<script>location.href='?page=default';</script>;";
			} else{
				print "<script>alert('ERROR');</script>";
				print "<script>location.href='?page=default';</script>;";
			}
			break;

		case 'conserto':
			
			$status = '';
			$sql_status = "SELECT status FROM acervo WHERE id = ".$_REQUEST['id'];
			$res_status = $conn->query($sql_status);
			if ($res_status) {
			    $row_status = $res_status->fetch_object();
			    $status = $row_status->status;
			}

			if ($status == 'Conserto') {
			    $sql = "UPDATE acervo SET status = 'Livre' WHERE id = ".$_REQUEST['id'];
			} else {
			    $sql = "UPDATE acervo SET status = 'Conserto' WHERE id = ".$_REQUEST['id'];
			}

			$res = $conn->query($sql);

			if ($res) {
			    print "<script>alert('Status atualizado');</script>";
			    print "<script>location.href='?page=default';</script>;";
			} else {
			    print "<script>alert('ERROR');</script>";
			    print "<script>location.href='?page=default';</script>;";
			}
			break;
			
		case 'excluirObra':

			$sql = "DELETE FROM acervo WHERE id_obra = ".$_REQUEST['id'];
			$res = $conn->query($sql);
			
			$sql = "DELETE FROM obra WHERE id = ".$_REQUEST['id'];
			$res = $conn->query($sql);

			if ($res==true) {
				print "<script>alert('Deletado');</script>";
				print "<script>location.href='?page=default';</script>;";
			} else{
				print "<script>alert('ERROR');</script>";
				print "<script>location.href='?page=default';</script>;";
			}
			break;
	}
?>
