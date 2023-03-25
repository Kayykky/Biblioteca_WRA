<?php  
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome'];
			$turma = $_POST['turma'];

			$sql = "INSERT INTO usuario (nome, turma) VALUES ('{$nome}', '{$turma}')";

			$res = $conn->query($sql);

			if ($res==true) {
				print "<script>alert('Cadastrado');</script>";
				print "<script>location.href='?page=default';</script>;";
			} else{
				print "<script>alert('ERROR');</script>";
				print "<script>location.href='?page=default';</script>;";
			}
			break;

		case 'editar':
			$nome = $_POST['nome'];
			$turma = $_POST['turma'];

			$sql = "UPDATE usuario SET 
						nome='{$nome}',
						turma='{$turma}' WHERE id=".$_REQUEST['id'];

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
			
			$sql = "DELETE FROM usuario WHERE id=".$_REQUEST['id'];

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