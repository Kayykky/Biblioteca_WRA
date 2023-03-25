<fieldset>
	<h1>Novo Usuário</h1><br>
	<form action="?page=salvar" method="post">
		<input type="hidden" name="acao" value="cadastrar">

		<label>Nome:</label><br>
		<input type="text" name="nome" required><br>
	
		<label>Turma:</label><br>
		<select name="turma" required>
			<option value="" disabled selected>Selecione</option>
			<option value="Professor">Professor</option>
			<option value="1A">1A</option>
			<option value="1B">1B</option>
			<option value="1C">1C</option>
			<option value="1D">1D</option>
			<option value="2A">2A</option>
			<option value="2B">2B</option>
			<option value="2C">2C</option>
			<option value="2D">2D</option>
			<option value="3A">3A</option>
			<option value="3B">3B</option>
			<option value="3C">3C</option>
			<option value="3D">3D</option>
		</select><br><br>
	
		<button type="submit" class="button">Enviar</button>
	</form>
</fieldset>
