<?php
include_once ("conexao.php");
$nome =mysqli_real_escape_string($conexao, $_POST['nome']);
$ent1 = mysqli_real_escape_string($conexao, $_POST['ent1']);
$ent2 = mysqli_real_escape_string($conexao, $_POST['ent2']);
$ent3 = mysqli_real_escape_string($conexao, $_POST['ent3']);
$resultado = mysqli_real_escape_string($conexao, $_POST['resultado']);



$sql = "INSERT INTO notas(nome, ent1, ent2, ent3, resultado) VALUES ('$nome','$ent1', '$ent2', '$ent3', '$resultado')";

if (mysqli_query($conexao, $sql)) {
    header("location: retorno.php");
} else {
    echo "Erro ao inserir os dados: " . mysqli_error($conexao);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $resultado = $_POST["resultado"]; // Obtém o valor do resultado enviado pelo JavaScript

    // Insira o valor no banco de dados (substitua os nomes das tabelas e colunas de acordo com sua estrutura)
    $sql2 = "INSERT INTO resultado (resultado) VALUES ('$resultado')";

    if (mysqli_query($conexao, $sql2)) {
        
    } else {
        echo "Erro ao inserir o resultado: " . mysqli_error($conexao);
    }
}



// if (mysqli_query($conexao, $sql2)) {
//     echo "Mês inserido com sucesso!";
// } else {
//     echo "Erro ao inserir o mês: " . mysqli_connect_error($conexao);
// }

mysqli_close($conexao);

?>