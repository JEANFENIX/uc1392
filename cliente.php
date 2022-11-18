<?php
include 'conecta.php';
// criando consulta SQL
$consultaSql = "SELECT * FROM cliente where deleted is null order by nome, cpf asc";
$consultaSqlArq = "SELECT * FORM cliente where deleted is not null order by nome, cod_cliente asc";

// buscando e listando os dados da tabela (completa)
$lista = $pdo->query($consultaSql);
$listaArq = $pdo->query($consultaSqlArq);

// separar em linhas
$row = $lista->fetch();
$rowArq = $listaArq->fetch();
// separar em linhas
$num_rows = $lista->rowCount();

// busca cliente por código
$nome = "";
$cpf = "";
$cod = 0;
if (isset($_GET['codedit']))

{
    $queryEdit = "SELECT * FROM cliente where cod_cliente=".$_GET['codedit'];
    $cliente = $pdo->query($queryEdit)->fetch();
    $cod  = $_GET['codedit'];
    $nome  = $cliente['nome'];
    $cpf = $cliente['cpf'];
}
// retornando o númaru de linhas
// alter table cliente add deleted datetime null;

// codigo para arquivar(excluir)
if (isset($_GET['codarq']))
{
    $queryarq = "update cliente set deleted = null where cod_cliente=".$_GET['codres'];
    $cliente = $pdo->query($queryArq)->fetch();
    header('location: cliente.php');
}

// restaurar o cliente
if (isset($_GET['codres']))
{
    $queryArq = "update cliente set deleted = null where cod_cliente=".$_GET['codres'];
     $cliente = $pdo->query($queryArq)->fetch();
     header('location: cliente.php');
 }
  // remover definitivamente (LGPD)
  if (isset($_GET['codexc']))
 {
    $queryExc = "delete from cliente where cod_cliente=".$_GET['codexc'];
     $cliente = $pdo->query($queryExc)->fetch();
     header('location: cliente.php');
 }

if(isset($_POST['enviar'])) // inserir ou alterar
{ // insere o cliente
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $consulta = "insert cliente (nome, cpf) values ('$nome','$cpf')";
    $resultado = $pdo->query($consulta);
    $_POST['enviar'] = null;
    header('location: cliente.php');
}

if(isset($_POST['alterar']))

{
  // Alterar os dados do cliente
  $cod = $_POST['cod-cliente'];
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $updateSql = "update cliente set nome = '$nome', cpf='$cpf' where cpd_cliente = $cod";
  $resultado = $pdo->query($updateSql);
  header('location: cliente.php');
}

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clientes (<?php echo $num_rows?>)</title>
    <link rel="stylesheet" href="css/style.css">
    <style>

        td{

            border-bottom: 1px solid red;

        }

    </style>

</head>

<body>
        <section class="formulario">
            <form action="#" method="post">
                <div hidden>
                    <label for="cod-cliente"> 
                        Código
                        <input type="text" name="cod-cliente" value="$cod">
                    </label>
                </div>
                <div>
                    <label for="nome">
                    Nome 
                    <input type="text" name="nome" required value="<?php echo $nome;?>">
                    </label>
                </div>
                <div>
                    <label for="cpf">
                        CPF 
                        <input type="number" name="cpf" required value="<?php echo $cpf;?>">
                    </label>
                </div>
                <div>
                 <!-- <-- usamos o if ternário para trocar texto do botão --> 
                    <button type="submit" name="enviar"><?php echo $cod<1?'Enviar': 'Alterar';?></button>
                </div>
            </form>
        </section>
    <table>

        <thead>

            <th hidden>Cod</th>

            <th>Nome</th>

            <th>CPF</th>

            <th colspan="2">Ações</th>

        </thead>

        <tbody>

            <?php do {?>

                <tr>

                    <td hidden><?php echo $rowArq['cod_cliente'];?></td>

                    <td><?php echo $rowArq['nome'];?></td>

                    <td><?php echo $rowArq['cpf'];?></td>

                    <td><a href="cliente.php?codedit=<?php echo $rowArq['cod_cliente'];?>">Editar</a></td>
                    <td><a href="cliente.php?codarq=<?php echo $rowArq['cod_cliente'];?>">Arquivar</a></td>

                </tr>

            <?php } while ($rowArq = $listaArq->fetch())?>

        </tbody>

    </table>

</body>

</html>
