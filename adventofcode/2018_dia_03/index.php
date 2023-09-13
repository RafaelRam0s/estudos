<?php 

    $origem = '' . __DIR__ . '/entrada.txt';
    $conteudo = [];
    
    if(is_file($origem))
    {
        $fd = fopen($origem, 'r');
        while(!feof($fd))
        {
            $linha = fgets($fd);
            array_push($conteudo, $linha);
        }
        fclose($fd);
    }

    






?>