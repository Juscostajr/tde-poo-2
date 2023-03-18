<?php
/**
 * Classe Pessoa, sempre o nome da classe deve ser iniciado
 * com letra Maiúscula!!!
 */
class Pessoa
{
    /**
     * Propriedades da classe, são as variáveis da classe,
     * o uso do private garante que essas propriedades não 
     * fiquem acessíveis de fora da classe.
     */

    //O tipo string recebe uma texto qualquer.
    private string $nome;
    //O tipo int recebe um número inteiro.
    private int $idade;
    //O tipo sexo é um Enum, que possúi os valores MASCULINO e FEMININO.
    private Sexo $sexo;
    //O tipo Cpf é recebe uma instância da classe Cpf.
    private Cpf $cpf;
    //O tipo Altura recebe uma instância da classe Altura.
    private Altura $altura;
    //O tipo Peso recebe uma instância da classe Peso.
    private Peso $peso;

    /**
     * Construtor da classe, o construtor é o método que
     * será automaticamente chamado, assim que a classe for
     * instânciada.
     * Nosso construtor, está recebendo valores como parâmetro
     * e atribuindo esses valores para nossas propriedades da 
     * classe.
     */
    public function __construct(
            string $nome,
            int $idade,
            Sexo $sexo,
            Cpf $cpf, 
            Altura $altura, 
            Peso $peso
            )
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->altura = $altura;
        $this->peso = $peso;
    }

    /**
     * Abaixo estão os getters, são métodos públicos, ou seja,
     * acessíveis de fora da classe, que retornam o valor das
     * propriedades da classe.
     */

    //Retorna o valor da propriedade $nome, que é do tipo string.
    public function getNome() : string {
        return $this->nome;
    }

    //Retorna o valor da propriedade $idade, que é do tipo int.
    public function getIdade() : int {
        return $this->idade;
    }

    //Retorna o valor da propriedade $peso, que é do tipo Peso.
    public function getPeso() : Peso {
        return $this->peso;
    }

    //Retorna o valor da propriedade $sexo, que é do tipo Sexo.
    public function getSexo() : Sexo {
        return $this->sexo;
    }

    //Retorna o valor da propriedade $cpf, que é do tipo Cpf.
    public function getCpf() : Cpf {
        return $this->cpf;
    }

    //Retorna o valor da propriedade Altura, que é do tipo $altura.
    public function getAltura(): Altura {
        return $this->altura;
    }

    /**
     * Abaixo estão os demais métodos da classe
     */
    public function calcularIMC(): float {
        /**
         * O peso é convertido em kg para calcular o IMC,
         * verifiquem que um projeto com boa orientação a objetos
         * conta uma estorinha ao instanciar, pois temos uma sequência,
         * chamamos a propriedade peso, que é uma instância da classe Peso,
         * chamamos o método converter da classe Peso e passamos como parâmetro
         * uma unidade de medida, que é do tipo Enum. O método converter, retorna
         * outra instância da classe Peso, porém com a nova unidade de medida e o
         * valor já convertido para esta unidade de medida. Por fim chamamos o método
         * getValor que irá nos retornar o valor do peso convertido para kg.
         */
        $peso = $this
                    ->peso
                    ->converter(UnMedida::KILOGRAMA)
                    ->getValor();
        
        //Com a altura ocorre o mesmo.
        $altura = $this
                    ->altura
                    ->converter(UnMedida::METRO)
                    ->getValor();

        //Por fim, retornamos um float com o calculo do IMC.
        return $peso / pow($altura,2);
    }

    /**
     * Observe o uso da orientação a objetos no método abaixo.
     * O método retorna um texto comparando a altura entre duas pessoas, 
     * como parâmetro não recebemos a altura, e sim uma pessoa, pois sabemos que 
     * a classe Pessoa possui a propriedade altura.
     * Observe também que método só recebe uma pessoa como parâmetro, isso ocorre
     * pois a outra pessoa é a próprio objeto ao qual está sendo invocado o método.
     * Repare que o calculo da diferença não está na classe Pessoa e sim na classe
     * Altura. Em orientação a objetos é fundamental separar responsabilidades, se
     * a comparação é entre alturas, o método deve estar na classe Altura e não na
     * classe Pessoa.
     */
    public function compararAltura(Pessoa $pessoa) : string {
        //Invocamos o método diferenca da classe Altura
        $diferenca = $this->getAltura()->diferenca($pessoa->getAltura());
        //Utilizamos um ternário para chamar de 'menor' se a diferença for negativa e 'maior' se for positiva.
        $menorMaior = $diferenca->getValor() < 0 ? 'menor' : 'maior';
        //Modificamos o valor do objeto diferença, para que fique positivo.
        $diferenca->setValor(abs($diferenca->getValor()));
        $pessoaA = $this->nome;
        $pessoaB = $pessoa->getNome();
        //Retornamos tudo concatenado
        return $pessoaA . ' é ' . $diferenca->toString() . ' ' . $menorMaior . ' que ' . $pessoaB;
    }


}