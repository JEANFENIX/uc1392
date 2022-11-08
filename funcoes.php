<?php
function parcelar(float $taxa, int $parcela = 2) :float
{
    $coeficiente = pow ((1 + ($taxa/100)), $parcela)/$parcela; 
    return $coeficiente; // parcelas fixas
}
?>