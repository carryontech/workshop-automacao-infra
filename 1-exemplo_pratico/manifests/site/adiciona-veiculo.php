<?php include("cabecalho.php");
      include("conecta.php");
      include("banco-veiculo.php"); ?>
<?php

$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$ano = $_POST["ano"];
$preco = $_POST["preco"];
$fabricante = $_POST["fabricante"];
$tipo = $_POST["tipo"];

if(insereVeiculo($conexao, $modelo,$cor,$ano,$preco,$fabricante,$tipo)){ ?>
   <p class="text-success">O Veículo <?= $modelo; ?> foi adicionado com sucesso!</p>
 <?php } else {
   $msg = mysqli_error($conexao);
?>
  <p class="text-danger">O Veículo <?= $modelo; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
 ?>

<?php include("rodape.php"); ?>
