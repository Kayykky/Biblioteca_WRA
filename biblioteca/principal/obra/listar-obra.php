<fieldset>
	<h1>Listar obras</h1><br>
	<?php
		$sql = "SELECT * FROM obra";
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
			print "<th>Capa</th>";
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
				print "<td><img src=../../assets/capas/".$row->capa." width='100px'></td>";
				print "<td>
						<button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='button'>Editar</button><br><br>
						<button onclick=\"if(confirm('Tem certeza?')){location.href='?page=salvar&acao=excluirObra&id=".$row->id."';}else{false;}\" class='button2'>Excluir</button>
				   		</td>";
				print "</tr>";
			}
			print "</table>";
		} else{
			print "<p style='color: red'>Sem resultados</p>";
		}
	?>
</fieldset>