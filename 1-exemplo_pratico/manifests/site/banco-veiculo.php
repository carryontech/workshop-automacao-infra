<?php
function listaVeiculos($conexao){
    $veiculos = array();
    $resultado = mysqli_query($conexao, "select cod_veiculo,modelo_veiculo,cor_veiculo,ano_fab,preco_veiculo,fabricante,tipo_veiculo FROM `Veiculo`");

    while ($veiculo = mysqli_fetch_assoc($resultado)){
      array_push($veiculos, $veiculo);
    }
    return $veiculos;
}

function insereVeiculo($conexao, $modelo,$cor,$ano,$preco,$fabricante,$tipo){
    $query = "insert into Veiculo (modelo_veiculo,cor_veiculo,ano_fab,preco_veiculo,fabricante,tipo_veiculo) values ('{$modelo}','{$cor}','{$ano}','{$preco}','{$fabricante}','{$tipo}')";
    return mysqli_query($conexao, $query);
}

function alteraVeiculo($conexao, $cod,$modelo,$cor,$ano,$preco,$fabricante,$tipo){
  $query = "update Veiculo set modelo_veiculo='{$modelo}', cor_veiculo ='{$cor}', ano_fab = '{$ano}', preco_veiculo = '{$preco}', fabricante = '{$fabricante}', tipo_veiculo = '{$tipo}' where cod_veiculo = '{$cod}'";
  return mysqli_query($conexao, $query);
}

function removeVeiculo($conexao, $cod){
  $query = "delete from Veiculo where cod_veiculo = '{$cod}'";
  return mysqli_query($conexao, $query);
}

function buscaVeiculo($conexao, $cod){
  $query = "select * from Veiculo where cod_veiculo = '{$cod}'";
  $resultado = mysqli_query($conexao, $query);
  return mysqli_fetch_assoc($resultado);
}

 ?>
