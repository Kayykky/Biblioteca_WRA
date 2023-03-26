<?php
    $sql = "SELECT * FROM obra";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
    
    if ($qtd > 0) {
        print "<table>";
        print "<tr>";
        print "<th>Título</th>";
        print "<th>Autor</th>";
        print "<th>Gênero</th>";
        print "<th>Edição</th>";
        print "<th>Capa</th>";
        print "<th>Link</th>";
        print "</tr>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>".$row->titulo."</td>";
            print "<td>".$row->autor."</td>";
            print "<td>".$row->genero."</td>";
            print "<td>".$row->edicao."</td>";
            print "<td><img src=assets/capas/".$row->capa." width='100px'></td>";
            print "<td>
                        <button onclick=\"location.href='?page=resultado&id=".$row->id."';\" class='button3'>Visitar</button>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    } else{
        print "<p style='color: red'>Sem resultados</p>";
    }
?>