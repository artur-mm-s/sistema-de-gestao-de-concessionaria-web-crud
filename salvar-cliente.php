<?php
	switch($_REQUEST['acao']) {
		case 'cadastrar':	
			$nome = $_POST['nome_cliente'];
			$cpf = $_POST['cpf_cliente'];
			$telefone = $_POST['telefone_cliente'];
			$email = $_POST['email_cliente'];
			$endereco = $_POST['endereco_cliente'];
			$nasc = $_POST['dt_nasc_cliente'];

		$sql = "INSERT INTO cliente(nome_cliente, cpf_cliente, telefone_cliente, email_cliente, endereco_cliente, dt_nasc_cliente )
				VALUES ('{$nome}', '{$cpf}', '{$telefone}', '{$email}', '{$endereco}', '{$nasc}')";

		$res = $conn->query($sql);
		if($res == true) {
			print "<script>alert('Cadastrou com sucesso!');</script>";
			print "<script>location.href='?page=listar-cliente';</script>";
		}else{
			print "<script>alert('Não cadastrou');</script>";
			print "<script>location.href='?page=listar-cliente';</script>";
		}
		break;

	case 'editar':
			$nome = $_POST['nome_cliente'];
			$cpf = $_POST['cpf_cliente'];
			$telefone = $_POST['telefone_cliente'];
			$email = $_POST['email_cliente'];
			$endereco = $_POST['endereco_cliente'];
			$nasc = $_POST['dt_nasc_cliente'];

		$sql = "UPDATE cliente SET nome_cliente='{$nome}', cpf_cliente='{$cpf}', telefone_cliente='{$telefone}', email_cliente='{$email}', endereco_cliente='{$endereco}', dt_nasc_cliente='{$nasc}' WHERE id_cliente=".$_REQUEST['id_cliente'];

		$res = $conn->query($sql);

		if($res == true){
			print "<script>alert('Editou com sucesso!');</script>";
			print "<script>location.href='?page=listar-cliente';</script>";
		}else{
			print "<script>alert('Não editar');</script>";
			print "<script>location.href='?page=listar-cliente';</script>";
		}
		break;

	case 'excluir':
		$sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];

		$res = $conn->query($sql);


		if($res == true){
			print "<script>alert('Excluiu com sucesso!');</script>";
			print "<script>location.href='?page=listar-cliente';</script>";
		}else{
			print "<script>alert('Não excluiu');</script>";
			print "<scipt>location.href='?page=listar-cliente';</script>";
		}

		break;
	}
?>