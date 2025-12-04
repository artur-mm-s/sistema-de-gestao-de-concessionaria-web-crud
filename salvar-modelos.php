<?php

if (!isset($_REQUEST['acao'])) {
    die("Ação não informada.");
}

$acao = $_REQUEST['acao'];

switch ($acao) {


    case 'cadastrar':

        $required = ['nome_modelo', 'cor_modelo', 'ano_modelo', 'marca_id_marca'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
                die("Campo obrigatório faltando: " . $field);
            }
        }

        $nome = trim($_POST['nome_modelo']);
        $cor = trim($_POST['cor_modelo']);
        $ano = trim($_POST['ano_modelo']);
        $marca_id = intval($_POST['marca_id_marca']);

        $sql = "INSERT INTO modelo (nome_modelo, cor_modelo, ano_modelo, marca_id_marca) VALUES (?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssii", $nome, $cor, $ano, $marca_id);
            if ($stmt->execute()) {
                echo "<script>alert('Modelo cadastrado com sucesso!');location.href='?page=listar-modelo';</script>";
            } else {
                die("Erro ao inserir modelo: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Erro ao preparar INSERT: " . $conn->error);
        }

        break;


    case 'editar':


        if (!isset($_POST['id_modelo']) || trim($_POST['id_modelo']) === '') {
            die("id_modelo não informado para edição.");
        }

        $id = intval($_POST['id_modelo']);

        $required = ['nome_modelo', 'cor_modelo', 'ano_modelo', 'marca_id_marca'];
        foreach ($required as $field) {
            if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
                die("Campo obrigatório faltando: " . $field);
            }
        }

        $nome = trim($_POST['nome_modelo']);
        $cor = trim($_POST['cor_modelo']);
        $ano = trim($_POST['ano_modelo']);
        $marca_id = intval($_POST['marca_id_marca']);

        $sql = "UPDATE modelo SET nome_modelo = ?, cor_modelo = ?, ano_modelo = ?, marca_id_marca = ? WHERE id_modelo = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssiii", $nome, $cor, $ano, $marca_id, $id);
            if ($stmt->execute()) {
                echo "<script>alert('Modelo atualizado com sucesso!');location.href='?page=listar-modelo';</script>";
            } else {
                die("Erro ao atualizar modelo: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Erro ao preparar UPDATE: " . $conn->error);
        }

        break;


    case 'excluir':

        if (!isset($_REQUEST['id_modelo']) || trim($_REQUEST['id_modelo']) === '') {
            die("id_modelo não informado para exclusão.");
        }

        $id = intval($_REQUEST['id_modelo']);

        $sql = "DELETE FROM modelo WHERE id_modelo = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "<script>alert('Modelo excluído com sucesso!');location.href='?page=listar-modelo';</script>";
            } else {
                die("Erro ao excluir modelo: " . $stmt->error);
            }
            $stmt->close();
        } else {
            die("Erro ao preparar DELETE: " . $conn->error);
        }

        break;

    default:
        die("Ação inválida: " . htmlspecialchars($acao));
}
?>
