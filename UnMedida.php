    <?php 

    /**
     * As enumerações podem retornar valores, em PHP os valores ficam guardados em
     * uma propriedade implícita 'value'. 
     * Exemplo: UnMedida::METRO->value irá retornar a string 'm'
     */
    enum UnMedida : string
    {
        /**
         * Aqui estão definidos os valores para cada opção.
         */
        case METRO = 'm';
        case CENTIMETRO = 'cm';
        case MILIMETRO = 'mm';
        case KILOMETRO = 'km';
        case GRAMA = 'g';
        case KILOGRAMA = 'kg';

        public function getConversao(): float 
        {
            /**
             * $tabelaConversão é um array associativo. Um array associativo permite
             * definir manualmente o índice, que pode ser um inteiro ou uma
             * string. No caso abaixo estamos acessando os valores da própria Enum UnMedida
             * que irá retornar uma string.
             */
            $tabelaConversao = [
                UnMedida::METRO->value => 1,
                UnMedida::CENTIMETRO->value => 1/100,
                UnMedida::MILIMETRO->value => 1/1000,
                UnMedida::KILOMETRO->value => 1000,
                UnMedida::GRAMA->value => 1,
                UnMedida::KILOGRAMA->value => 1000
            ];

            /**
             * $this->value refere-se ao valor do item selecionado
             * exemplo: UnMedida::KILOMETRO, $this->value retornará a string 'km'.
             * O método getConversao() retorna a posição $this->value do array $tabelaConversao,
             * ou seja, se $this-value for 'km', irá retornar a posição 
             * UnMedida:KILOMETRO->value (que também é 'km'), 
             * portanto retornará o valor 1000.
             */
            return $tabelaConversao[$this->value];
        }
    }