<fieldset>
<h1>Listar funcionários</h1><br>
	<?php
		$sql = "SELECT * FROM funcionario";

		$res = $conn->query($sql);

		$qtd = $res->num_rows;

		if ($qtd > 0) {
			print "<table>";
			print "<tr>";
			print "<th>ID</th>";
			print "<th>Nome</th>";
			print "<th>Login</th>";
			print "<th>Ações</th>";
			print "</tr>";
			while ($row = $res->fetch_object()) {
				print "<tr>";
				print "<td>".$row->id."</td>";
				print "<td>".$row->nome."</td>";
				print "<td>".$row->login."</td>";
				print "<td>
						<button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='button'>Editar</button>
						<button onclick=\"if(confirm('Tem certeza?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" class='button2'>Excluir</button>
				   		</td>";
				print "</tr>";
			}
			print "</table>";
		} else{
			print "<p style='color: red'>Sem resultados</p>";
		}
	?>
</fieldset>