<?php 

include 'conecta.php';

// cria a consulta sql
$consultaSql = "SELECT * FROM filme order by titulo asc";

// trazer a lista completa dos dados 
$lista = $pdo->query("$consultaSql");
$listaClass = $pdo->query("select cod_classificacao as id, classificacoes as class from classificacao");

// separar os dados em linhas
$rowClass = $listaClass->fetch();
// $linha = $lista->fetch();

$row = $lista->fetch();

// retornando o número de linhas

// $num_linhas = $lista->rowCount();

$num_rows = $lista->rowCount();

if(isset($_POST['enviar'])){
    $titulo = $_POST['titulo'];
    $sinopse = $_POST['sinopse'];
    $genero = $_POST['genero'];
    $lancamento = $_POST['lancamento'];
    $origem = $_POST['origem'];
    $preco = $_POST['preco'];
    $classificacao = $_POST['classificacao'];

    $consulta = "inset filme (titulo, sinopse, genero, lancamento, origem, duracao, preco, classificacao) values ('$titulo','$sinopse','$genero','$lancamento','$origem','$duracao','$preco','$classificacao')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null;
    header('location: filme.php');
}

// if($mysqli ->more_results()) do{

// }



// echo 'A consulta retornou <stong>'.$num_linhas. ' </strong> Filmes <br>';

// do{
//     echo $linha['titulo'].' - '.$linha['lancamento'].'<br>';
// }while($linha = $lista -> fetch());

//print_r($linha);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Filmes <?php echo '(' .$num_rows.')' ?></title>

</head>
<body>
    <section class="formulario">
        <form action="#" method="POST"></form>
        <div hidden>
            <label for="cod-filme">
                Código
                <input type="text" name="cod-filme">
            </label>
        </div>
        <div>
            <label for="titulo">
                Título
                <input type="text" name="titulo" required>
            </label>
        </div>
        <div>
            <label for="sinopse">
                Sinopse
                <input type="text" name="sinopse" required>
            </label>
        </div>
        <div>
            <label for="genero">
                Genero
                <input type="text" name="genero" required>
            </label>
        </div>
        <div>
            <label for="lancamento">
                Lançamento
                <input type="text" name="lancamento" required>
            </label>
        </div>
        <div>
            <label for="origem">
                Origem
                <input type="text" name="origem" required>
            </label>
        </div>
        <div>
            <label for="preco">
                Preço 
                <input type="text" name="preco" required>
            </label>
        </div>
        <div>
            <label for="classificacao">
                Classificação
                <input type="text" name="classificacacao" required>
            </label>
        </div>
        <div>
                            <label for="Classificacao">
                                Classificação
                                <select name="class" id="">
                                    <?php do { ?>
                                    <option value="<?php echo $rowClass['id']?>"><?php echo $rowClass['class']?></option>
                                    <?php } while($rowClass = $listaClass->fetch());?>
                                </select>
                            </label>
                        </div>
                        <div> 
                            <button type="button" class="btn btn-success">enviar</button>
                        </div>
    </section>
    <table>
        <thead>
            <th hidden>ID</th>
            <th>Título</th>
            <th>Sinopse</th>
            <th>Genero</th>
            <th>Lançamento</th>
            <th>Origem</th>
            <th>Duração</th>
            <th>Preço</th>
            <th>Classificação</th>
        </thead>
        <tbody>
            <?php do {?>
                <tr>
                    <td hidden><?php echo $row['cod_filme'];?></td>
                    <td><?php echo $row['titulo'];?></td>
                    <td><?php echo $row['sinopse'];?></td>
                    <td><?php echo $row['genero'];?></td>
                    <td><?php echo $row['lancamento'];?></td>
                    <td><?php echo $row['origem'];?></td>
                    <td><?php echo $row['duracao'];?></td>
                    <td><?php echo $row['preco'];?></td>
                    <td><?php echo $row['classificacoes'];?></td>
                </tr>
            <?php }while($row = $lista->fetch());?>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
