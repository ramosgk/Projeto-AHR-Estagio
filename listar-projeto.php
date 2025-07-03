<h1>Listar Projetos</h1>
<?php
$sql = "SELECT * FROM projeto";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Contato</th>";
        print "<th>Cidade</th>";
        print "<th>Tipo</th>";
        print "<th>Ações</th>";
        print "</tr>";
    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>" .$row->id."</td>";
        print "<td>" .$row->nome."</td>";
        print "<td>" .$row->contato."</td>";
        print "<td>" .$row->cidade."</td>";
        print "<td>" .$row->tipo."</td>";
        print "<td>
        <button onclick=\"location.href='?page=editar&id=".$row->id."';\" class='btn btn-success'>Editar</button>
        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;}\" 
        class='btn btn-danger'>Excluir</button>
        </td>";
        print "</tr>";
    }
    print "</table>";

}else{
    print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
}

?>