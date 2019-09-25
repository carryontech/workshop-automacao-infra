<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-veiculo.php"); ?>

      <?php
      	session_start();
      	echo "Usuario: ". $_SESSION['usuarioNome'];
      ?>
      <br>
      <a href="sair.php">Sair</a>



<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
    <p class="alert-success">Veiculo apagado com sucesso.</p>
<?php } ?>

<table class="table table-striped table-bordered">
  <tr style="background-color:#FA8072">
    <td>Modelo do Veículo</td>
    <td>Cor do Veículo</td>
    <td>Preço</td>
    <td>Ano de fabricação</td>
    <td>Fabricante</td>
    <td>Tipo</td>
    <td></td>
    <td></td>
  <tr>


    <?php
        $veiculos = listaVeiculos($conexao);
        foreach($veiculos as $veiculo) :
    ?>
    <tr>
        <td><?= $veiculo['modelo_veiculo'] ?></td>
        <td><?= $veiculo['cor_veiculo'] ?></td>
        <td><?= $veiculo['ano_fab'] ?></td>
        <td><?= $veiculo['preco_veiculo'] ?></td>
        <td><?= $veiculo['fabricante'] ?></td>
        <td><?= $veiculo['tipo_veiculo'] ?></td>
        <td><a class="btn btn-primary" href="form_altera_veiculo.php?id=<?=$veiculo['cod_veiculo']?>">alterar</a></td>
        <td>
            <form action="remove-veiculo.php" method="post">
                <input type="hidden" name="id" value="<?=$veiculo['cod_veiculo']?>" />
                <button class="btn btn-danger">remover</button>
            </form>
        </td>
    </tr>
    <?php
        endforeach
    ?>
</table>

<?php include("rodape.php"); ?>
