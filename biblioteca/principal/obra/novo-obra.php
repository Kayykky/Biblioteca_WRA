<fieldset>
	<h1>Nova obra</h1><br>
	<form action="?page=salvar" method="post" enctype="multipart/form-data">
		<input type="hidden" name="acao" value="cadastrar">

		<label>Título:</label><br>
		<input type="text" name="titulo" required><br>
	
		<label>Autor:</label><br>
		<input type="text" name="autor" required><br><br>

		<label>Gênero:</label>
		<select name="genero" required>
			<option value="" disabled selected>Selecione</option>
			<option value="Ficção">Ficção</option>
			<option value="Poesia">Poesia</option>
			<option value="Romance">Romance</option>
			<option value="Conto">Conto</option>
			<option value="Crônica">Crônica</option>
			<option value="Fábula">Fábula</option>
			<option value="Fantasia">Fantasia</option>
			<option value="Novela">Novela</option>
			<option value="Biografia">Biografia</option>
			<option value="Autobiografia">Autobiografia</option>
			<option value="Memória">Memória</option>
			<option value="Juvenil">Juvenil</option>
			<option value="Memória">Memória</option>
			<option value="Quadrinho">Quadrinho</option>
			<option value="Didático">Didático</option>
		</select><br><br>

		<label>Editora:</label><br>
		<input type="text" name="editora" required><br><br>

		<label>Edição:</label><br>
		<input type="number" name="edicao" required><br><br>

		<label>Capa:</label><br>
		<input type="file" name="capa" accept="image/png,image/jpeg" required><br><br>

		<label>Quant.:</label><br>
		<input type="number" name="quant" required><br><br>
	
		<button type="submit" class="button">Enviar</button>
	</form>
</fieldset>
