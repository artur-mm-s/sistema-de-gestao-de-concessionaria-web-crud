<?php
if (!isset($_REQUEST["acao"])) {
    die("Ação não informada.");
}
switch ($_REQUEST["acao"]) {

    case "cadastrar":

        $data = $_POST["data_venda"];
        $valor = $_POST["valor_venda"];
        $cliente = $_POST["cliente_id_cliente"];
        $funcionario = $_POST["funcionario_id_funcionario"];
        $modelo = $_POST["modelo_id_modelo"];

        $sql = "INSERT INTO venda (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo)
                VALUES ('{$data}', '{$valor}', '{$cliente}', '{$funcionario}', '{$modelo}')";

        if ($conn->query($sql)) {
            echo "<script>alert('Venda cadastrada com sucesso!'); location.href='?page=listar-venda';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar venda!');</script>";
        }

        break;

    case "editar":

        $id = $_POST["id_venda"];
        $data = $_POST["data_venda"];
        $valor = $_POST["valor_venda"];
        $cliente = $_POST["cliente_id_cliente"];
        $funcionario = $_POST["funcionario_id_funcionario"];
        $modelo = $_POST["modelo_id_modelo"];

        $sql = "UPDATE venda SET
                    data_venda = '{$data}',
                    valor_venda = '{$valor}',
                    cliente_id_cliente = '{$cliente}',
                    funcionario_id_funcionario = '{$funcionario}',
                    modelo_id_modelo = '{$modelo}'
                WHERE id_venda = {$id}";

        if ($conn->query($sql)) {
            echo "<script>alert('Venda atualizada com sucesso!'); location.href='?page=listar-venda';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar venda!');</script>";
        }

        break;


    case "excluir":

        $id = $_REQUEST["id_venda"];

        $sql = "DELETE FROM venda WHERE id_venda = {$id}";

        if ($conn->query($sql)) {
            echo "<script>alert('Venda excluída com sucesso!'); location.href='?page=listar-venda';</script>";
        } else {
            echo "<script>alert('Erro ao excluir venda!');</script>";
        }

        break;
}
?>
