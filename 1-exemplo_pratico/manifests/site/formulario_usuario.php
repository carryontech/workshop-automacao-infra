<?php include("cabecalho.php");
      include("conecta.php");
?>

<h1>Formulário de cadastro de usuários</h1>
<form action="adiciona-usuario.php" method="post">
    <table class="table">
        <tr>
            <td>Nome do usuário</td>
            <td><input class="form-control" type="text" name="nome" /></td>
        </tr>
        <tr>
            <td>Último nome</td>
            <td><input class="form-control" type="text" name="nome" /></td>
        </tr>
        <tr>
            <td>Número do CPF</td>
            <td><input class="form-control" type="text" name="cpf" /></td>
        </tr>
        <tr>
            <td>Número do RG</td>
            <td><input class="form-control" type="text" name="rg" /></td>
        </tr>
        <tr>
            <td>Data de Nascimento</td>
            <td><input class="form-control" type="text" name="datanascimento" /></td>
        </tr>
        <tr>
            <td>Idade</td>
            <td><input class="form-control" type="text" name="idade" /></td>
        </tr>
        <tr>
            <td>Endereço</td>
            <td><input class="form-control" type="text" name="endereco" /></td>
        </tr>
        <tr>
            <td>Login</td>
            <td><input class="form-control" type="text" name="login" /></td>
        </tr>
        <tr>
            <td>Senha/td>
            <td><input class="form-control" type="text" name="senha" /></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input class="form-control" type="text" name="email" /></td>
        </tr>

            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
