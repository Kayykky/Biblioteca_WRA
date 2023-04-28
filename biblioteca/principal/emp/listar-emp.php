<fieldset>
<h1>Listar empréstimos</h1><br>
	<?php
		$sql = "SELECT emprestimo.id, 
       				   usuario.nome as nome_user,
       				   usuario.turma as turma_user,
       				   acervo.id as id_acervo, 
        			   obra.titulo as titulo_obra, 
       				   funcionario.nome as nome_func, 
       				   data_dev FROM emprestimo 
					   INNER JOIN usuario ON emprestimo.id_user = usuario.id 
					   INNER JOIN acervo ON emprestimo.id_acervo = acervo.id 
					   INNER JOIN obra ON acervo.id_obra = obra.id 
				   	   INNER JOIN funcionario ON emprestimo.id_func = funcionario.id;";

		$res = $conn->query($sql);
		$qtd = $res->num_rows;

		if ($qtd > 0) {
			print "<table>";
			print "<tr>";
			print "<th>ID</th>";
			print "<th>Livro</th>";
			print "<th>Cod.</th>";
			print "<th>Nome</th>";
			print "<th>Turma</th>";
			print "<th>Funcionário</th>";
			print "<th>Data de devolução</th>";
			print "<th>Ações</th>";
			print "</tr>";
			while ($row = $res->fetch_object()) {
				print "<tr>";
				print "<td>".$row->id."</td>";
				print "<td>".$row->titulo_obra."</td>";
				print "<td>".$row->id_acervo."</td>";
				print "<td>".$row->nome_user."</td>";
				print "<td>".$row->turma_user."</td>";
				print "<td>".$row->nome_func."</td>";
				print "<td>".date('d-m-Y', strtotime($row->data_dev))."</td>";
				print "<td>
						<button onclick=\"location.href='?page=validar&id=".$row->id."';\" class='button'>Validar</button>
				   		</td>";
				print "</tr>";
			}
			print "</table>";
		} else{
			print "<p style='color: red'>Sem resultados</p>";
		}
	?>
</fieldset>
