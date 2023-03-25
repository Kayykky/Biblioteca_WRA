<?php 
	$sql = "SELECT * FROM funcionario WHERE id=".$_REQUEST['id'];

	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<fieldset>
	<h1>Editar funcionário</h1><br>
	<form action="?page=salvar" method="post">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id" value="<?php print $row->id ?>">

		<label>Nome:</label><br>
		<input type="text" name="nome" value="<?php print $row->nome ?>"><br>
	
		<label>Login:</label><br>
		<input type="text" name="login" value="<?php print $row->login ?>"><br>

		<label>Senha:</label><br>
		<input type="text" name="senha" required><br><br>
	
		<button type="submit" class="button">Editar</button>
	</form>
</fieldset>