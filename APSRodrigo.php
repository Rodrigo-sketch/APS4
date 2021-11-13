<?php
// Elabore um programa que receba 18 nomes (alunos) distribuídos por 2 salas com uma matriz 3x3 em cada.
// Permita ao usuário informar um nome para pesquisar nas matrizes, deverão serem retornadas
// as duas matrizes(salas) originais (desenhadas lado a lado) com as posições onde estão o valor informado
// na cor Amarela.
// Deverão ser impressas as posições [x,y,z] onde foram encontrados o nome e quantas vezes aparece.


// diego       maria       joao                aucides     tereza      pedro
// diego       maria       joao                aucides     tereza      pedro
// diego       maria       joao                aucides     tereza      pedro

// Busca: pedro
// SALA 1                                      SALA 2
// pedro       maria       joao                aucides     tereza      (pedro***)
// diego       maria       joao                aucides     tereza      (pedro***)
// diego       maria       joao                aucides     tereza      (pedro***)

// PEDRO FOI ENCONTRADO NA SALA 1 NO ÍNDICE:
// [0][0][0]

// PEDRO FOI ENCONTRADO NA SALA 2 NOS ÍNDICES:
// [1][0][2]
// [1][1][2]
// [1][2][2]

// * Ignorar case sensitive.

// exercício poderá ser realizado em grupo, no entanto a entrega deve ser individual.
// fiquem atentos ao prazo para envio data/hora 


define("PADRAO","\033[0m");
define("VERMELHO","\033[31m");
define("VERDE","\033[32m");
define("AMARELO","\033[33m");
define("AZUL","\033[34m");
define("MAGENTA","\033[35m"); 
define("CIANO","\033[36m");
define("BRANCO","\033[37m");

$continuar = "";
$cont = 0;

$matriz1[][] = null;
for ($i=0; $i < 3 ; $i++) {     
    for ($j=0; $j < 3; $j++) {
            $cont++;
            $linha = (string) readline("Digite o ".$cont."º nome da Sala 1: ");
            if (strlen($linha) > 0){
                $matriz1[$i][$j] = $linha;
            }else{
                echo VERMELHO."O nome não pode ser vazio!".PADRAO."\n";
                $j--;
                $cont--;
            }        
    }
}

echo AZUL."\nSala 1 preenchida com sucesso! Total de ".$cont." alunos\n\n".PADRAO;

$cont = 0;
$matriz2[][] = null;
for ($i=0; $i < 3 ; $i++) { 
    for ($j=0; $j < 3; $j++) {
            $cont++;
            $linha = (string) readline("Digite o ".$cont."º nome da Sala 2: ");
            if (strlen($linha) > 0){
                $matriz2[$i][$j] = $linha;
            }else{
                echo VERMELHO."O nome não pode ser vazio!".PADRAO."\n";
                $j--;
                $cont--;
            } 
    }
}
echo AZUL."\nSala 2 preenchida com sucesso! Total de ".$cont." alunos\n\n".PADRAO;

do {
    $resultado1 = "";
    $resultado2 = "";
    $pesquisa = "";
    $achou1 = 0;
    $achou2 = 0;
    $pesquisa = (string) readline("Digite um nome para pesquisa: ");

    echo "\n";
    echo "Busca: ".AMARELO.$pesquisa.PADRAO."\n\n";
    echo "SALA1\t\t\t\t\tSALA2\n";

    for ($i=0; $i < 3 ; $i++) {     
        for ($j=0; $j < 3; $j++) {
            echo $matriz1[$i][$j]."\t";                
        }
        echo "\t\t";
        for ($j=0; $j < 3; $j++) {
            echo $matriz2[$i][$j]."\t";                
        }
        echo "\n";
    }

    echo "\n\n";
    $sala1=0;
    for ($i=0; $i < 3 ; $i++) {     
        for ($j=0; $j < 3; $j++) {
                if (strcasecmp($matriz1[$i][$j], $pesquisa) == 0) {
                    $achou1++;
                    $resultado1 = $resultado1."[".$sala1."] [".$i."] [".$j."]\n";
                }        
        }
    }
    $sala2=1;
    for ($i=0; $i < 3 ; $i++) {     
        for ($j=0; $j < 3; $j++) {
                if (strcasecmp($matriz2[$i][$j], $pesquisa) == 0) {
                    $achou2++;
                    $resultado2 = $resultado2."[".$sala2."] [".$i."] [".$j."]\n";
                }        
        }
    }


    if ($achou1>0){
        if ($achou1>1){
            echo AMARELO.$pesquisa.PADRAO. " FOI ENCONTRADO NA SALA 1 NOS ÍNDICES:\n";
        }else{
            echo AMARELO.$pesquisa.PADRAO. " FOI ENCONTRADO NA SALA 1 NO ÍNDICE:\n";
        }
        echo $resultado1;
    }

    echo "\n";
    if ($achou2>0){
        if ($achou2>1){
            echo AMARELO.$pesquisa.PADRAO. " FOI ENCONTRADO NA SALA 2 NOS ÍNDICES:\n";
        }else{
            echo AMARELO.$pesquisa.PADRAO. " FOI ENCONTRADO NA SALA 2 NO ÍNDICE:\n";
        }
        echo $resultado2."\n\n";
    }

    if ($achou1==0 && $achou2==0){
        echo AMARELO.$pesquisa.PADRAO. " NÃO FOI ENCONTRADO EM NENHUMA DAS SALAS\n\n";
    }

    $continuar = (string) readline('Deseja fazer uma nova pesquisa? (S/N): ');

}while (strcasecmp($continuar, "s") == 0);

echo CIANO. " FIM do Prorama!\n\n";
?>