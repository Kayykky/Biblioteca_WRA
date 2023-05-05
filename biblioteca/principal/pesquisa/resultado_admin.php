<?php
    $sql = "SELECT obra.titulo, 
                   obra.autor, 
                   obra.genero, 
                   obra.editora,
                   obra.edicao,
                   obra.capa FROM obra WHERE obra.id =".$_REQUEST['id'];

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        $row = $res->fetch_object();
        print "<h2>".$row->titulo."</h2>";
        print "<p>Autor: ".$row->autor."</p>";
        print "<p>Gênero: ".$row->genero."</p>";
        print "<p>Editora: ".$row->editora."</p>";
        print "<p>Edição: ".$row->edicao."</p>";
        print "<img src=assets/capas/".$row->capa." width='200px'>";

        $sql = "SELECT COUNT(*) as qtd FROM acervo WHERE id_obra = ".$_REQUEST['id'];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
        $qtd = $row->qtd;
        print "<p>Existem $qtd cópias dessa obra no acervo</p>";

        $sql = "SELECT acervo.id, 
                       acervo.status FROM acervo WHERE acervo.id_obra =".$_REQUEST['id'];

        $res = $conn->query($sql);

        $qtd = $res->num_rows;

        if ($qtd > 0) {
                print "<table>";
                print "<tr>";
                print "<th>ID</th>";
                print "<th>Status</th>";
                print "<th>Ações</th>";
                print "</tr>";
                while ($row = $res->fetch_object()) {
                    print "<tr>";
                    print "<td>".$row->id."</td>";              
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
    } else{
        print "<p style='color: red'>Sem resultados</p>";
    }
?>
