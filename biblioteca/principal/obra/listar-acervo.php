<fieldset>
<h1>Listar livros</h1><br>
	<?php
		$sql = "SELECT acervo.id, 
					   obra.titulo, 
					   obra.autor, 
					   obra.genero,
					   obra.editora,
					   obra.edicao,
		               acervo.status FROM obra JOIN acervo ON obra.id = acervo.id_obra";

		$res = $conn->query($sql);

		$qtd = $res->num_rows;

		if ($qtd > 0) {
			print "<table>";
			print "<tr>";
			print "<th>ID</th>";
			print "<th>Título</th>";
			print "<th>Autor</th>";
			print "<th>Gênero</th>";
			print "<th>Editora</th>";
			print "<th>Edição</th>";
			print "<th>Status</th>";
			print "<th>Ações</th>";
			print "</tr>";
			while ($row = $res->fetch_object()) {
				print "<tr>";
				print "<td>".$row->id."</td>";				
				print "<td>".$row->titulo."</td>";
				print "<td>".$row->autor."</td>";
				print "<td>".$row->genero."</td>";
				print "<td>".$row->editora."</td>";
				print "<td>".$row->edicao."</td>";
				print "<td>".$row->status."</td>";
				print "<td>
						<button onclick=\"if(confirm('Tem certeza?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='button2'>Excluir</button>
						<button onclick=\"if(confirm('Tem certeza?')){location.href='?page=salvar&acao=conserto&id=".$row->id."';}else{false;}\" class='button3'>Conserto</button>
				   		</td>";
				print "</tr>";
			}
			print "</table>";
		} else{
			print "<p style='color: red'>Sem resultados</p>";
		}
	?>
</fieldset>