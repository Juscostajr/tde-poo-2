<?php
/**
 * Neste arquivo index, fazemos apenas as instanciações das classes, ou seja, 
 * criamos os objetos.
 * Em seguida mostramos os valores na tela.
 */

 /**
  * O comando require_once permite que o arquivo index.php tenha acesso aos demais
  * arquivos.
  */
require_once('Pessoa.php');
require_once('Peso.php');
require_once('UnMedida.php');
require_once('Altura.php');
require_once('Cpf.php');
require_once('Sexo.php');

//Criamos uma instância de Pessoa e guardamos este objeto na variável $ana.
$ana = new Pessoa(
    'Ana',
    25,
    Sexo::FEMININO,
    new Cpf('153456879','65'),
    new Altura(1.65,UnMedida::METRO),
    new Peso(60,UnMedida::KILOGRAMA)
);

//Criamos uma instância de Pessoa e guardamos este objeto na variável $paulo.
$paulo = new Pessoa(
    'Paulo',
    30,
    Sexo::MASCULINO,
    new Cpf('658785498','87'),
    new Altura(180,UnMedida::CENTIMETRO),
    new Peso(75,UnMedida::KILOGRAMA)
);

//Encerramos o trecho de código php
?>

<!-- Tudo fora do trecho em PHP, será interpretado como HTML -->
<table>
    <tr>
        <th colspan="2">
            <!-- 
                Dentro do HTML inserimos pequenos trechos de PHP, tag abaixo
                é o mesmo que abrir um trecho em PHP, fazer um echo e encerrar
                o trecho PHP.
            -->
            <?= $ana->getNome() ?>
        </th>
    </tr>
    <tr>
        <td>Idade</td>
        <td><?= $ana->getIdade() ?></td>
    </tr>
    <tr>
        <td>Altura</td>
        <!-- 
            O método toString() da classe Altura, retorna a altura formatada
            com duas casas decimais e a sigla da unidade de medida da altura.
        -->
        <td><?= $ana->getAltura()->toString() ?></td>
    </tr>
    <tr>
        <td>Peso</td>
        <td><?= $ana->getPeso()->toString() ?></td>
    </tr>
    <tr>
        <td>IMC</td>
        <td><?= $ana->calcularIMC() ?></td>
    </tr>
</table>

<table>
    <tr>
        <th colspan="2">
            <?= $paulo->getNome() ?>
        </th>
    </tr>
    <tr>
        <td>Idade</td>
        <td><?= $paulo->getIdade() ?></td>
    </tr>
    <tr>
        <td>Altura</td>
        <!--
            Quando o objeto $paulo foi instanciado, sua altura foi definida em cm
            Agora para ser exibido em metros, foi necessário realizar a conversão.
            O método toString da classe Altura, retorna a medida formatada com duas
            casas decimais e a sigla da unidade de medida.
        -->
        <td><?= $paulo->getAltura()->converter(UnMedida::METRO)->toString() ?></td>
    </tr>
    <tr>
        <td>Peso</td>
        <td><?= $paulo->getPeso()->toString() ?></td>
    </tr>
    <tr>
        <td>IMC</td>
        <td><?= $paulo->calcularIMC() ?></td>
    </tr>
</table>
<table>
    <tr>
        <th colspan="2">Conversões</th>
    </tr>
    <tr>
        <td>Comparar Altura</td>
        <td><?= $ana->compararAltura($paulo) ?>.</td>
    </tr>


</table>