<h1>Listar Vendas</h1>	

<?php
$sql = "SELECT * FROM venda
        INNER JOIN cliente 
        ON venda.cliente_id_cliente = cliente.id_cliente

        INNER JOIN funcionario 
        ON venda.funcionario_id_funcionario = funcionario.id_funcionario
        
        INNER JOIN modelo 
        ON venda.modelo_id_modelo = modelo.id_modelo";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>ID Venda</th>";
    echo "<th>Data</th>";
    echo "<th>Valor</th>";
    echo "<th>Cliente</th>";
    echo "<th>Funcionário</th>";
    echo "<th>Modelo</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while($row = $res->fetch_object()){
        
        echo "<tr>";
        echo "<td>".$row->id_venda."</td>";
        echo "<td>".$row->data_venda."</td>";
        echo "<td>".$row->valor_venda."</td>";
        echo "<td>".$row->nome_cliente."</td>";
        echo "<td>".$row->nome_funcionario."</td>";
        echo "<td>".$row->nome_modelo."</td>";

        echo "<td>";


        echo "<button class='btn btn-success'
                onclick=\"location.href='?page=editar-venda&id_venda=".$row->id_venda."';\">
                Editar
              </button> ";

        echo "<button class='btn btn-danger'
                onclick=\"if(confirm('Deseja realmente excluir?')){
                    location.href='?page=salvar-venda&acao=excluir&id_venda=".$row->id_venda."';
                }\">
                Excluir
              </button>";

        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

}else{
    echo "<p>Não encontrou resultado</p>";
}
?>
