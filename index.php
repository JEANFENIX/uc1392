<?php

include ('config.php');
include ('funcoes.php');

// "/* /"comentário de bloco
// "//" comentário de linha 
// "#" comentário de linha
// início - declaração de variáveis 
echo parcelar(10,4); // 10% em 4 parcelas
// $nome ="Nathalia";
// $data_nasc = date('2003/02/11');
// echo($nome." - ".$data_nasc);
// echo('<br>');
// $hoje = date("D,d  M Y H:i:s");
// echo(">>>>>>>>>>".$hoje);
// echo('<br>');
// /*$date = date_create('2000-01-01', timezone_open('America/Sao_Paulo'));
// echo date_format($date, 'Y-m-d H:i:sP') . "\n";
// echo('<br>');
// date_timezone_set($date, timezone_open('Pacific/Chatham'));
// echo date_format($date, 'Y-m-d H:i:sP') . "\n";
// */
// $valor = 78.98;
// $idade = 32;
// $teste = true;
// // final - declaração de variáveis

// //declaração e uso matrizes
// $alunos = array();
// $alunos[0] = "Maria";
// $alunos[1] = "João";
// $nota = array(9,8,7,4);
// print_r($nota);
// echo('<br>');
// $pontos = array('José' => '11','Lucas'=>'5', 'Jean'=>'9'); 
// print_r($pontos);
// echo('<br>');

// //estrutura de decisão
// if(!($idade>=30)){ // se verdadeiro então 
//     echo("Aluno em lista para classificação");
// }

// $a = 1; $b= 9;
// if($a > $b){
//     echo("A variavel '$a' é maior '$b'" );
// } elseif($a < $b){
//     echo("O valor '$b' é menor '$a'");
// } else{
//     echo("O valor '$a' é igual '$b'");
// }
//     echo("<br>");
//     $n = 5;
// //estruturas de repetição

// //uso a estrutura "while" quando não conheço limite 
// while($a < 11){ //tabuada de um número
//     echo($n. 'x '.$a. " = ".($a*$n)."<br>");
//     $a = $a + 1;
// }
// echo("<br>");
// for($i=1; $i < 11; $i++){
//     echo($n.' x '.$i." = ".($i*$n)."<br>" );
// }
// echo("<br>");
// $nota = array(9,8,7,4);

// for ($i=0; $i < 4; $i++){
//     echo($nota[$i]);
//     echo("<br>");
// }

//declaração e uso matrizes
$pessoas = array(
    ' 98H47O '=> ([' Well ', ' Professor ']), 
    ' 25P45F '=> ([' Nath','Linda']), 
    ' 85U41R '=> ([' Ellen', ' Fofa ']), 
    ' 63D23A '=> ([' Helen ', ' Maravilha '])
);

if (isset($_GET['enviar'])){ // se o u(DU)ário clicar no botão
    $id_frm = $_GET['id'];
    $nome_frm = $_GET['nome'];
    $descri_frm = $_GET['descricao'];
    $pessoas += [$id_frm => ([$nome_frm, $descri_frm])];
}

?>

<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <!-- <meta http-equiv="refresh" content="1"> -->
        <link rel="stylesheet"  href="css/style.css">
    </head>
    <body>
        <form action="aula4.php" method="post">
            <button type="submit">Parcelamento</button>
            <br>
            <hr>
        </form>
        <form action="#" method="get">
        <label for="id">
            Id
            <input type="text" name="id" required>
        </label><br>
        <label for="nome">
         Nome 
         <input type="text" name="nome" required>
        </label><br>
        <label for="descricao">
            descrição
            <input type="text" name="descricao" required>
        </label><br>
        <button type="submit" name="enviar" id="btn-enviar">Enviar</button>
        </form>

        <table class="tabelinha">
            <th>id</th>
            <th>nome</th>
            <th>descrição</th>
            <tr>
                <td>10Y96B</td>
                <td>Nathalia</td>
                <td>Baixinha</td>
            </tr>
            <?php
               foreach($pessoas as $id => $nome){?>
               <tr>
               <td><?php echo($id);?></td>
               <td><?php echo($nome[0]);?></td>
               <td><?php echo($nome[1]);?></td>
               </tr>
             <?php } ?>
        </table>
    </body>
</html>