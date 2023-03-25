<?php  
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$id_user = $_POST['id_user'];
			$id_acervo = $_POST['id_acervo'];
			$id_func = $_POST['id_func'];
			$data_dev = $_POST['data_dev'];

			$sql = "SELECT * FROM usuario WHERE id = {$id_user}";
			$res_user = $conn->query($sql);
			$qtd_user = $res_user->num_rows;

			$sql = "SELECT * FROM acervo WHERE id = {$id_acervo} AND status = 'Livre'"; 
			$res_acervo = $conn->query($sql);
			$qtd_acervo = $res_acervo->num_rows;

			if ($qtd_user > 0 && $qtd_acervo > 0) { 
			    $sql = "INSERT INTO emprestimo (id_user, id_acervo, id_func, data_dev) VALUES ('{$id_user}','{$id_acervo}', '{$id_func}', '{$data_dev}')";
			    $res = $conn->query($sql);

			    $sql = "UPDATE acervo SET status = 'Ocupado' WHERE id =".$id_acervo;
			    $res = $conn->query($sql);

			    if ($res==true) {
			        print "<script>alert('Cadastrado');</script>";
			        print "<script>location.href='?page=default';</script>;";
			    } else{
			        print "<script>alert('ERROR');</script>";
			        print "<script>location.href='?page=default';</script>;";
			    }
			} else {
			    print "<script>alert('Algum dos IDs é inválido ou o livro não está disponível');</script>";
			    print "<script>location.href='?page=default';</script>;";
			}
			break;

		case 'excluir':

			$sql = "UPDATE acervo SET status = ".$_POST['$status']." WHERE id ".$_REQUEST['id_acervo'];
			$res = $conn->query($sql);

			$sql = "SELECT * FROM emprestimo WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			$row = $res->fetch_assoc();
			$data_dev = date("Y-m-d");
			$notas = $_POST['notas'];

			$sql = "INSERT INTO historico (id_acervo, id_user, id_func, data_emp, data_dev, notas) VALUES ('".$row['id_acervo']."', '".$row['id_user']."', '".$row['id_func']."', '".$row['data_dev']."', '".$data_dev."', '".$notas."')";
			$res = $conn->query($sql);

			$sql = "DELETE FROM emprestimo WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);

			if ($res==true) {
			    print "<script>alert('Validado');</script>";
			    print "<script>location.href='?page=default';</script>;";
			} else{
			    print "<script>alert('ERROR');</script>";
			    print "<script>location.href='?page=default';</script>;";
			}
			break;


		case 'excluirHist':

			$sql = "DELETE FROM historico";
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