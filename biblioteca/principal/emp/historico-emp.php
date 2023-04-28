<fieldset>
<h1>Histórico empréstimos</h1><br>
	<?php
		print "<button onclick=\"if(confirm('Tem certeza?')){location.href='?page=salvar&acao=excluirHist';}else{false;}\" class='button2'>Excluir histórico</button>";

		$sql = "SELECT historico.id, 
       				   usuario.nome as nome_user,
       				   usuario.turma as turma_user,
       				   acervo.id as id_acervo, 
        			   obra.titulo as titulo_obra, 
       				   funcionario.nome as nome_func, 
       				   data_emp,
       				   data_dev,
       				   notas FROM historico 
					   INNER JOIN usuario ON historico.id_user = usuario.id 
					   INNER JOIN acervo ON historico.id_acervo = acervo.id 
					   INNER JOIN obra ON acervo.id_obra = obra.id 
				   	   INNER JOIN funcionario ON historico.id_func = funcionario.id;";

		$res = $conn->query($sql);
		$qtd = $res->num_rows;

		if ($qtd > 0) {
			print "<br><br><table>";
			print "<tr>";
			print "<th>ID</th>";
			print "<th>Nome</th>";
			print "<th>Turma</th>";
			print "<th>Cod. Livro</th>";
			print "<th>Título</th>";
			print "<th>Funcionário</th>";
			print "<th>Data prazo</th>";
			print "<th>Data de devolução</th>";
			print "<th>Notas</th>";
			print "</tr>";
			while ($row = $res->fetch_object()) {
				print "<tr>";
				print "<td>".$row->id."</td>";
				print "<td>".$row->nome_user."</td>";
				print "<td>".$row->turma_user."</td>";
				print "<td>".$row->id_acervo."</td>";
				print "<td>".$row->titulo_obra."</td>";
				print "<td>".$row->nome_func."</td>";
				print "<td>".date('d-m-Y', strtotime($row->data_emp))."</td>";
				print "<td>".date('d-m-Y', strtotime($row->data_dev))."</td>";
				print "<td>".$row->notas."</td>";
			}
			print "</table>";
		} else{
			print "<p style='color: red'>Sem resultados</p>";
		}
	?>
</fieldset>
