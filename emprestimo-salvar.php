<?php
$acao = @$_REQUEST['acao'];
switch ($acao) {
    case 'cadastrar':
        $livro_id_livro = @$_REQUEST['livro_id_livro'];
        $usuario_id_usuario = @$_REQUEST['usuario_id_usuario'];
        $funcionario_id_funcionario = @$_REQUEST['funcionario_id_funcionario'];
        $data_emprestimo = @$_REQUEST['data_emprestimo'];
        $data_devolucao = @$_REQUEST['data_devolucao'];

        $sql = "INSERT INTO emprestimos 
                (livro_id_livro, usuario_id_usuario, funcionario_id_funcionario, data_emprestimo, data_devolucao)
                VALUES ('$livro_id_livro', '$usuario_id_usuario', '$funcionario_id_funcionario',
                 '$data_emprestimo', '$data_devolucao')";

        $resultado = $conn->query($sql);

        if($resultado){
            alert("Cadastrado com sucesso !");
            redirect('?page=emprestimo-listar');
        } else{
            alert("Erro ao cadastrar. ");
            redirect('?page=emprestimo-listar');
         }
       break;

    case 'remover':
        $id = @$_REQUEST['id'];
        $sql = "DELETE FROM emprestimos WHERE emprestimo_id = $id";
        $resultado = $conn->query($sql);

        if ($resultado){
            alert("Removido com sucesso !");
            redirect('?page=emprestimo-listar');
        } else {
            alert("Erro ao remover ");
            redirect('?page=emprestimo-listar');
        }
        break;

    case 'editar':
        $id = @$_REQUEST['id'];
        $livro_id_livro = @$_REQUEST['livro_id_livro'];
        $usuario_id_usuario = @$_REQUEST['usuario_id_usuario'];
        $funcionario_id_funcionario = @$_REQUEST['funcionario_id_funcionario'];
        $data_emprestimo = @$_REQUEST['data_emprestimo'];
        $data_devolucao = @$_REQUEST['data_devolucao'];

        $sql = "UPDATE emprestimos SET 
                livro_id_livro = '$livro_id_livro',
                usuario_id_usuario = '$usuario_id_usuario',
                funcionario_id_funcionario = '$funcionario_id_funcionario',
                data_emprestimo = '$data_emprestimo',
                data_devolucao = '$data_devolucao'
                WHERE emprestimo_id = '$id'";

        $resultado = $conn->query($sql);

        if ($resultado){
            alert("Edição concluída com sucesso !");
            redirect('?page=emprestimo-listar');
        } else {
            alert("Erro ao editar !");
            redirect('?page=emprestimo-listar');
        }
        break;
}
?>
