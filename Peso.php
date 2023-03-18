<?php
require_once('UnMedida.php');

class Peso
{
    private float $valor;
    private UnMedida $unMedida;

    public function __construct(float $valor,UnMedida $unMedida)
    {
        $this->valor = $valor;
        $this->unMedida = $unMedida;
    }

    public function converter(UnMedida $UnMedida) : Peso {
        $unidadePadrao = $this->valor * $this->unMedida->getConversao();
        $novoValor = $unidadePadrao / $UnMedida->getConversao();
        return new Peso($novoValor,$UnMedida);
    }

    public function getValor() : float {
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function toString() : string {
        return number_format($this->valor,2,',','.') 
            . ' ' 
            . $this->unMedida->value; 
    }

    public function getUnMedida() : UnMedida {
        return $this->unMedida;
    }


}