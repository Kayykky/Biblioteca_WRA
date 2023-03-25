<?php  
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];

			$sql = "INSERT INTO funcionario (nome, login, senha) VALUES ('{$nome}', '{$login}', '{$senha}')";

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
			$login = $_POST['login'];
			$senha = $_POST['senha'];

			$sql = "UPDATE funcionario SET 
						nome='{$nome}',
						login='{$login}',
						senha='{$senha}'
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
			
			$sql = "DELETE FROM funcionario WHERE id=".$_REQUEST['id'];

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