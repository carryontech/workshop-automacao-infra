<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-veiculo.php");

      $id = $_GET['id'];
      $veiculo = buscaVeiculo($conexao, $id);

  ?>

  <h1>Alterando veículo<h1>
    <form action="altera-veiculo.php" method="post">
    <input type="hidden" name="id" value="<?=$veiculo['cod_veiculo']?>" />
    <table class="table">
        <tr>
            <td>Modelo do veículo</td>
            <td><input class="form-control" type="text" name="modelo" value="<?=$veiculo['modelo_veiculo']?>" /></td>
        </tr>
        <tr>
            <td>Cor do veículo</td>
            <td><input class="form-control" type="text" name="cor" value="<?=$veiculo['cor_veiculo']?>" /></td>
        </tr>
        <tr>
            <td>Ano de fabricação</td>
            <td><input class="form-control" type="text" name="ano" value="<?=$veiculo['ano_fab']?>" /></td>
        </tr>
        <tr>
            <td>Preço do veículo</td>
            <td><input class="form-control" type="text" name="preco" value="<?=$veiculo['preco_veiculo']?>" /></td>
        </tr>
        <tr>
            <td>Fabricante</td>
            <td><input class="form-control" type="text" name="fabricante" value="<?=$veiculo['fabricante']?>" /></td>
        </tr>
        <tr>
            <td>Tipo do veículo</td>
            <td><input class="form-control" type="text" name="tipo" value="<?=$veiculo['tipo_veiculo']?>" /></td>
        </tr>

        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
