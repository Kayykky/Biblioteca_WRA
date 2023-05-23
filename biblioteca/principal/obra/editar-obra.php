<?php 
	$sql = "SELECT * FROM obra WHERE id=".$_REQUEST['id'];

	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<fieldset>
	<h1>Editar livro</h1><br>
	<form action="?page=salvar" method="post">
		<input type="hidden" name="acao" value="editar">
		<input type="hidden" name="id" value="<?php print $row->id ?>">

		<label>Título:</label><br>
		<input type="text" name="titulo" value="<?php print $row->titulo ?>"><br>
	
		<label>Autor:</label><br>
		<input type="text" name="autor" value="<?php print $row->autor ?>"><br>

		<label>Editora:</label><br>
		<input type="text" name="editora" value="<?php print $row->editora ?>"><br><br>

		<label>Edição:</label><br>
		<input type="text" name="edicao" value="<?php print $row->edicao ?>"><br><br>
	
		<button type="submit" class="button">Editar</button>
	</form>
</fieldset>
