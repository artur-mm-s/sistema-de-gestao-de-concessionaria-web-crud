<h1>Editar Venda</h1>

<?php
    if(!isset($_GET["id_venda"])) {
        echo "<script>alert('ID da venda não informado!');history.back();</script>";
        exit;
    }

    $id_venda = intval($_GET["id_venda"]);

    $sql = "SELECT * FROM venda 
            WHERE id_venda = {$id_venda}";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if(!$row){
        echo "<script>alert('Venda não encontrada!');location.href='?page=listar-venda';</script>";
        exit;
    }
?>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php echo $row->id_venda; ?>">

    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" class="form-control"
               value="<?php echo $row->data_venda; ?>" required>
    </div>

    <div class="mb-3">
        <label>Valor da Venda</label>
        <input type="number" step="0.01" name="valor_venda" class="form-control"
               value="<?php echo $row->valor_venda; ?>" required>
    </div>

    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control" required>
            <option value="">Selecione</option>

            <?php
                $sql_cliente = "SELECT * FROM cliente ORDER BY nome_cliente";
                $res_cliente = $conn->query($sql_cliente);

                while($cli = $res_cliente->fetch_object()){
                    $selected = ($cli->id_cliente == $row->cliente_id_cliente) ? "selected" : "";
                    echo "<option value='{$cli->id_cliente}' {$selected}>{$cli->nome_cliente}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Funcionário</label>
        <select name="funcionario_id_funcionario" class="form-control" required>
            <option value="">Selecione</option>

            <?php
                $sql_func = "SELECT * FROM funcionario ORDER BY nome_funcionario";
                $res_func = $conn->query($sql_func);

                while($f = $res_func->fetch_object()){
                    $selected = ($f->id_funcionario == $row->funcionario_id_funcionario) ? "selected" : "";
                    echo "<option value='{$f->id_funcionario}' {$selected}>{$f->nome_funcionario}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Modelo</label>
        <select name="modelo_id_modelo" class="form-control" required>
            <option value="">Selecione</option>

            <?php
                $sql_modelo = "SELECT * FROM modelo ORDER BY nome_modelo";
                $res_modelo = $conn->query($sql_modelo);

                while($m = $res_modelo->fetch_object()){
                    $selected = ($m->id_modelo == $row->modelo_id_modelo) ? "selected" : "";
                    echo "<option value='{$m->id_modelo}' {$selected}>{$m->nome_modelo}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <button type="button" class="btn btn-secondary" onclick="history.back();">Cancelar</button>
    </div>

</form>
