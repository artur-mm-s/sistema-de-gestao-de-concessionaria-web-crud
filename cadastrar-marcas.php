<h1>Cadastrar Marcas</h1>
<form action="?page=salvar-marcas" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome da marca
				<input type="text" name="nome_marca" class="form-control" required>
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>