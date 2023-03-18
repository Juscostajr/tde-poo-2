<?php
/**
 * Classe Cpf, sempre o nome da classe deve ser iniciado
 * com letra Maiúscula!!!
 */
class Cpf
{
    private string $digitoVerificador; //22
    private string $numero; //123456789
    /**
     * No construtor da classe Cpf além de atribuirmos os 
     * valores recebidos por parâmetro as propriedades da
     * classe, também validamos o número e o digito verificador,
     * chamando os métodos, validarNumero() e validarDigito().
     */
    public function __construct($numero, $digitoVerificador)
    {
        $this->numero = $numero;
        $this->digitoVerificador = $digitoVerificador;
        $this->validarNumero();
        $this->validarDigito();
    }

    /**
     * Observe que este método é privado, desta forma
     * indicamos que ele só pode ser chamado de dentro
     * da própria classe.
     * A função strlen() conta a quantidade de caracteres
     * do numero do Cpf sem digito verificador, se ela for
     * diferente de 9, será disparada uma excessão, e a execução
     * do código, será interrompida.
     */
    private function validarNumero(){
       if (strlen($this->numero) != 9) {
            throw new Exception('CPF Inválido');
       } 
    }

    /**
     * O método validarDigito() é similar ao validarNumero()
     * a diferença aqui é que ao invés de verificar se a quantidade
     * de caracteres é 9, aqui verificamos se é 2.
     * Esse método poderia conter um algorítmo de validação de Cpf.
     * (desafio!) 
     */
    
    private function validarDigito(){
        if (strlen($this->digitoVerificador) != 2){
            throw new Exception('Digito inválido');
        }
    }

    /**
     * Esse método é publico, retorna uma string, concatenando o 
     * número do cpf com o digito verificador.
     */ 
    public function toString() : string {
        return $this->numero . $this->digitoVerificador;
    }
    
}