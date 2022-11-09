<?php
require 'config.php';
require 'funcoes.php';

// datas e strings

$atual = new DateTime();
$especifica = new DateTime('1992-04-22');
$data = new DateTime('+1 month');



print_r($atual);
echo '<br>';
print_r($especifica);
echo '<br>';
print_r($data);
echo '<br>';

echo $data->format('d,m,y');
$data = new DateTime('-44 year');
echo '<br>';
echo $data->format('d-m-y');

echo '<br>';
$datasistema = new DateTime();
$dataNascimento = new DateTime('1972-03-31');
$intervalo = $dataNascimento->diff(new DateTime());
print_r($intervalo); 
echo '<br>';
echo '<br>';
echo $intervalo->format('%y anos, %m meses e %d dias');

echo '<br>';
echo dataTexto(new DateTime('1932-10-29'));


?>