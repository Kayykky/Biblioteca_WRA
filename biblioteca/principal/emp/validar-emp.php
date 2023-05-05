<?php 
	$sql = "SELECT * FROM emprestimo WHERE id=".$_REQUEST['id'];

	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<fieldset>
	<h1>Validar empréstimo</h1><br>
	<form action="?page=salvar" method="post">
		<input type="hidden" name="acao" value="excluir">
		<input type="hidden" name="id" value="<?php print $row->id ?>">
		<input type="hidden" name="id_func" value="<?php echo $_SESSION['id'] ?>">

		<label>ID User:</label><br>		
		<input type="text" name="id_user" value="<?php echo $row->id_user ?>" readonly><br><br>

		<label>ID Livro:</label><br>
		<input type="text" name="id_acervo" value="<?php echo $row->id_acervo ?>" readonly><br><br>

		<label>Notas:</label><br>
		<textarea name="notas" value="Ok!"></textarea><br><br>

		<label>Status:</label><br>
		<select name="status">
			<option value="Livre" selected>Livre</option>
			<option value="Conserto">Conserto</option>
		</select><br><br>
	
		<button type="submit" class="button">Enviar</button>
	</form>
</fieldset>
