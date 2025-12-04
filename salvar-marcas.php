<?php
	switch($_REQUEST['acao']) {
		case 'cadastrar':	
			$nome = $_POST['nome_marca'];

		$sql = "INSERT INTO marca(nome_marca)
				VALUES ('{$nome}')";

		$res = $conn->query($sql);
		if($res == true) {
			print "<script>alert('Cadastrou com sucesso!');</script>";
			print "<script>location.href='?page=listar-marcas';</script>";
		}else{
			print "<script>alert('Não cadastrou');</script>";
			print "<script>location.href='?page=listar-marcas';</script>";
		}
		break;

	case 'editar':
		$nome = $_POST['nome_marca'];

		$sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca=".$_REQUEST['id_marca'];

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Editou com sucesso!');</script>";
			print "<script>location.href='?page=listar-marcas';</script>";
		}else{
			print "<script>alert('Não editar');</script>";
			print "<script>location.href='?page=listar-marcas';</script>";
		}
		break;

	case 'excluir':
		$sql = "DELETE FROM marca WHERE id_marca=".$_REQUEST['id_marca'];

		$res = $conn->query($sql);


		if($res == true){
			print "<script>alert('Excluiu com sucesso!');</script>";
			print "<script>location.href='?page=listar-marcas';</script>";
		}else{
			print "<script>alert('Não excluiu');</script>";
			print "<scipt>location.href='?page=listar-marcas';</script>";
		}

		break;
	}
?>