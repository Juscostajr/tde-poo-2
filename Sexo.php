<?php
/**
 * O Enum Sexo 
 * Exemplo de uso:
 * Sexo::MASCULINO->value
 * Irá retornar uma string 'Masculino'
 * Os Enums podem retornar dois tipos de dados: string e int
 */
enum Sexo : string {
    case MASCULINO = 'Masculino';
    case FEMININO = 'Feminino';
}