<?php
function parcelar(float $taxa, int $parcela = 2) :float
{
    $coeficiente = pow ((1 + ($taxa/100)), $parcela)/$parcela; 
    return $coeficiente; // parcelas fixas
}
?>

<?php

    function dataTexto (dateTime $data){
        $intervalo = $data->diff(new DateTime());       
    return  $intervalo->format('%y anos, %m meses e %d dias');
}
?>