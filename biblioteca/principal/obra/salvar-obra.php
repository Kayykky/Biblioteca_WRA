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
			    $quantNova = $_POST['quantNova'];

			    $sqlQuantAntiga = "SELECT quant FROM obra WHERE id=".$_REQUEST['id'];
			    $resQuantAntiga = $conn->query($sqlQuantAntiga);
			    $rowQuantAntiga = $resQuantAntiga->fetch_assoc();
			    $quantAntiga = $rowQuantAntiga['quant'];

			    $sql = "UPDATE obra SET 
			                titulo='{$titulo}',
			                autor='{$autor}',
			                editora='{$editora}',
			                edicao='{$edicao}',
			                quant='{$quantNova}'
			            WHERE id=".$_REQUEST['id'];

			    $res = $conn->query($sql);

			    if ($res==true) {
			        if ($quantNova > $quantAntiga) {
			            $dif = $quantNova - $quantAntiga;
			            $copias_inseridas = 0;
			            while ($copias_inseridas < $dif) {
			                $sql = "INSERT INTO acervo (id_obra, status) VALUES (".$_REQUEST['id'].", 'Livre')";
			                $res = $conn->query($sql);
			                $copias_inseridas++;
			            }
			        } elseif ($quantNova < $quantAntiga) {
			            $dif = $quantAntiga - $quantNova;
			            $sql = "DELETE FROM acervo WHERE id_obra=".$_REQUEST['id']." AND status='Livre' LIMIT {$dif}";
			            $res = $conn->query($sql);
			        }

			        print "<script>alert('Editado');</script>";
			        print "<script>location.href='?page=default';</script>;";
			    } else{
			        print "<script>alert('ERROR');</script>";
			        print "<script>location.href='?page=default';</script>;";
			    }
			    break;

		case 'excluir':

			$id = $_REQUEST['id'];
			$sql = "SELECT status FROM acervo WHERE id = $id";
			$res = $conn->query($sql);

			if ($res && $res->num_rows > 0) {
			    $row = $res->fetch_assoc();
			    $status = $row['status'];

			    if ($status == "Livre") {
			        $sql = "DELETE FROM acervo WHERE id = $id";
			        $res = $conn->query($sql);

			        if ($res==true) {
			            print "<script>alert('Deletado');</script>";
			            print "<script>location.href='?page=default';</script>";
			        } else {
			            print "<script>alert('ERROR');</script>";
			            print "<script>location.href='?page=default';</script>";
			        }
			    } else {
			        print "<script>alert('Status não é Livre');</script>";
			        print "<script>location.href='?page=default';</script>";
			    }
			} else {
			    print "<script>alert('ID não encontrado');</script>";
			    print "<script>location.href='?page=default';</script>";
			}
			break;

		case 'conserto':

			$id = $_REQUEST['id'];
			$sql = "SELECT status FROM acervo WHERE id = $id";
			$res = $conn->query($sql);
			
			if ($res && $res->num_rows > 0) {
				$row = $res->fetch_assoc();
				$status = $row['status'];
			
				if ($status == "Conserto") {
					$sql = "UPDATE acervo SET status = 'Livre' WHERE id = ".$_REQUEST['id'];
					$res = $conn->query($sql);
			
					if ($res==true) {
						print "<script>alert('Status atualizado');</script>";
						print "<script>location.href='?page=default';</script>";
					} else {
						print "<script>alert('ERROR');</script>";
						print "<script>location.href='?page=default';</script>";
					}
				} else if ($status == "Livre") {
					$sql = "UPDATE acervo SET status = 'Conserto' WHERE id = ".$_REQUEST['id'];
					$res = $conn->query($sql);
			
					if ($res==true) {
						print "<script>alert('Status atualizado');</script>";
						print "<script>location.href='?page=default';</script>";
					} else {
						print "<script>alert('ERROR');</script>";
						print "<script>location.href='?page=default';</script>";
					}
				} else {
					print "<script>alert('Status não é Livre');</script>";
					print "<script>location.href='?page=default';</script>";
				}
			} else {
				print "<script>alert('ID não encontrado');</script>";
				print "<script>location.href='?page=default';</script>";
			}
			
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
