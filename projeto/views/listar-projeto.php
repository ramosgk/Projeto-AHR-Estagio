<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Listar Projetos</h5>
        <?php
        // Query para selecionar todos os projetos da tabela 'projeto'.
        $sql = "SELECT * FROM projeto";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        // Condição que verifica se há projetos no banco de dados.
        if($qtd > 0){
            print "<div class='table-responsive'>";
            // A tabela usa classes do Bootstrap para um visual corporativo.
            print "<table class='table table-hover table-striped table-bordered'>"; 
            print "<thead>";
            print "<tr class='table-dark'>";
            print "<th scope='col'>#</th>";
            print "<th scope='col'>Nome do Projeto</th>";
            print "<th scope='col'>Cliente</th>";
            print "<th scope='col'>Contato</th>";
            print "<th scope='col'>Cidade</th>";
            print "<th scope='col'>Tipo</th>";
            print "<th scope='col'>Status</th>";
            print "<th scope='col'>Data de Início</th>";
            print "<th scope='col'>Ações</th>";
            print "</tr>";
            print "</thead>";
            print "<tbody>";
            // Loop para percorrer cada projeto encontrado no banco de dados.
            while($row = $res->fetch_object()){
                print "<tr>";
                print "<td>" .$row->id."</td>";
                print "<td>" .$row->nome."</td>";
                print "<td>" .$row->cliente."</td>";
                print "<td>" .$row->contato."</td>";
                print "<td>" .$row->cidade."</td>";
                print "<td>" .$row->tipo."</td>";
                print "<td>" .$row->status."</td>";
                // Formata a data para o padrão brasileiro.
                print "<td>" .date('d/m/Y', strtotime($row->data_inicio))."</td>";
                print "<td>
                <a href='?page=editar&id=".$row->id."' class='btn btn-dark btn-sm me-1'>Editar</a>
                <a onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}\" 
                class='btn btn-danger btn-sm'>Excluir</a>
                </td>";
                print "</tr>";
            }
            print "</tbody>";
            print "</table>";
            print "</div>";
        } else {
            // Mensagem de alerta se nenhum projeto for encontrado.
            print "<p class='alert alert-warning'>Nenhum projeto encontrado!</p>";
        }
        ?>
    </div>
</div>
