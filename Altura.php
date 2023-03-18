<?php
require_once('UnMedida.php');


class Altura
{
    private float $valor;
    private UnMedida $UnMedida;

    public function __construct(float $valor,UnMedida $UnMedida)
    {
        $this->valor = $valor;
        $this->UnMedida = $UnMedida;
    }

    public function converter(UnMedida $UnMedida) : Altura {
        $medidaEmMetros = $this->valor * $this->UnMedida->getConversao();
        $novaMedida = $medidaEmMetros / $UnMedida->getConversao();
        return new Altura($novaMedida,$UnMedida);
    }

    public function getValor() : float {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getUnMedida() : UnMedida {
        return $this->UnMedida;
    }

    public function toString() : string {
        return number_format($this->valor,2,',','.') 
            . ' ' 
            . $this->UnMedida->value; 
    }

    public function diferenca(Altura $altura) : Altura {
        $alturaA = $this->converter(UnMedida::CENTIMETRO);
        $alturaB = $altura->converter(UnMedida::CENTIMETRO);
        $diferenca = $alturaA->getValor() - $alturaB->getValor(); 
        return new Altura($diferenca,UnMedida::CENTIMETRO);
    }

}