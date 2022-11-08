<?php 
    include('config.php');
    include('funcoes.php');

$parcelas = array();
$coeficiente = 0.0;
if(isset($_POST['CALCULAR']))
    {
    $capital = $_POST['capital'];
    $taxa = $_POST['taxa'];
    $parcela = $_POST['parcela'];
    $coeficiente = parcelar(floatval($taxa), intval($parcela));

    $parcelas = ([$capital, $taxa, $parcela, $coeficiente*$capital]);
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="#" method="post">
    <input type="text" name="capital" placeholder="capital (R$)..."><br>
    <input type="text" name="taxa" placeholder="taxa (%)..."><br>
    <input type="text" name="parcela" placeholder="Parcelas (1)..."><br>
    <button type="submit" name="calcular">Calcular</button>
</form>
<br><hr>
<?php if (isset($parcela)){
    ?>
    <h3>Valor da parcela: R$ <?php echo $parcelas[3];?></h3>
    <?php
     }
    ?>
</body>
</html>