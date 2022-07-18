<?php
$msg = '';
if(isset($_GET['status'])){
    switch ($msg) {
        case 'success':
            $msg = '<div class="alert alert-success">Sucesso!</div>';
            break;
        case 'error':
            $msg = '<div class="alert alert-danger">Erro!</div>';
            break;
        default:
            break;
    }
}

$resultados = '';
foreach($usersDTO as $user){
    $resultados .= '<tr>
                            <td>'.$user->name.'</td>
                            <td>'.$user->email.'</td>
                            <td>
                                <a href="editar.php?id='.$user->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="deletar.php?id='.$user->id.'">
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </td>
                        </tr>';
}
?>
<main>


    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo Aluno</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?=$resultados?>
            </tbody>
        </table>
    </section>

    <?=$msg?>
</main>