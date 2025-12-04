<h1>Cadastrar Vendas</h1>
<form action="?page=salvar-venda" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Vendedor
				<select name="funcionario_id_funcionario" class="form-control" required>
					<option>Escolha um vendedor</option>
					<?php
						$sql = "SELECT * FROM funcionario";
						$res = $conn->query($sql);
						$qtd = $res->num_rows;
						if($qtd > 0){
							while($row = $res->fetch_object()){
								print "<option value='{$row->id_funcionario}'>{$row->nome_funcionario}</option>";
							}
						}else{
							print "<option>Não há clientes cadastradas</option>";
						}
					?>
				</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Comprador 
				<select name="cliente_id_cliente" class="form-control" required>
					<option>Escolha um cliente</option>
					<?php
						$sql = "SELECT * FROM cliente";
						$res = $conn->query($sql);
						$qtd = $res->num_rows;
						if($qtd > 0){
							while($row = $res->fetch_object()){
								print "<option value='{$row->id_cliente}'>{$row->nome_cliente}</option>";
							}
						}else{
							print "<option>Não há clientes cadastradas</option>";
						}
					?>
				</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Data da venda
				<input type="date" name="data_venda" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Modelo Vendido 
				<select name="modelo_id_modelo" class="form-control" required>
					<option>Escolha um modelo</option>
					<?php
						$sql = "SELECT * FROM modelo";
						$res = $conn->query($sql);
						$qtd = $res->num_rows;
						if($qtd > 0){
							while($row = $res->fetch_object()){
								print "<option value='{$row->id_modelo}'>{$row->nome_modelo}</option>";
							}
						}else{
							print "<option>Não há modelos cadastrados</option>";
						}
					?>
				</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Valor da venda
				<input type="number" name="valor_venda" class="form-control">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>