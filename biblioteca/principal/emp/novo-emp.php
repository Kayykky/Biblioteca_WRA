<fieldset>
	<h1>Novo empréstimo</h1><br>
	<form action="?page=salvar" method="post">
		<input type="hidden" name="acao" value="cadastrar">
		<input type="hidden" name="id_func" value="<?php echo $_SESSION['id'] ?>">

		<label>ID User:</label><br>
		<input type="text" name="id_user" required><br><br>

		<label>ID Livro:</label><br>
		<input type="text" name="id_acervo" required><br><br>

		<label>Data de devolução:</label><br>
		<input type="date" name="data_dev" required><br><br>
	
		<button type="submit" class="button">Enviar</button>
	</form>
</fieldset>
