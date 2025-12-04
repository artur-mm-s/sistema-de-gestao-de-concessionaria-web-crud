<h1>Editar Cliente</h1>
<?php
	$id=(int)$_REQUEST['id_cliente'];
	$sql = "SELECT * FROM  cliente WHERE id_cliente=$id";

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>
<form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_cliente" value="<?php print $row->id_cliente;?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_cliente" class="form-control" value="<?php print $row->nome_cliente;?>"required>
		</label>
	</div>
	<div class="mb-3">
		<label>Email
			<input type="text" name="email_cliente" class="form-control" value="<?php print $row->email_cliente;?>"required>
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_cliente" class="form-control" value="<?php print $row->telefone_cliente;?>"required>
		</label>
	</div>
	<div class="mb-3">
		<label>CPF
			<input type="text" name="cpf_cliente" class="form-control" value="<?php print $row->cpf_cliente;?>"required>
		</label>
	</div>
	<div class="mb-3">
		<label>Endereço
			<input type="text" name="endereco_cliente" class="form-control" value="<?php print $row->endereco_cliente;?>"required>
		</label>
	</div>
	<div class="mb-3">
		<label>Data de Nascimento
			<input type="date" name="dt_nasc_cliente" class="form-control" value="<?php print $row->dt_nasc_cliente;?>"required>
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>