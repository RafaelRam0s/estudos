<?php 

        $origem = '' . __DIR__ . '/arquivo_de_entrada.txt';
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



        $frequencia = 0;

        for($contador = 0; $contador < sizeof($conteudo); $contador++)
        {
            $sinal = $conteudo[$contador][0];
            $numero = ( substr($conteudo[$contador], 1) );

            if ($sinal == '+')
            {
                $frequencia += $numero;
            } elseif ($sinal == '-') 
            {
                $frequencia -= $numero;
            }
        }

        echo('Resultado de uma estrela: ' . $frequencia);





        $frequencia = 0;
        $lista_de_frequencias = [0];
        $frequencia_repetida = false;

        while ($frequencia_repetida === false)
        {
            for($contador = 0; ($contador < sizeof($conteudo)) && ($frequencia_repetida === false) ; $contador++)
            {
                $sinal = $conteudo[$contador][0];
                $numero = ( substr($conteudo[$contador], 1) );

                if ($sinal == '+')
                {
                    $frequencia += $numero;
                } elseif ($sinal == '-') 
                {
                    $frequencia -= $numero;
                }

                for ($contador_2 = 0; ($contador_2 < sizeof($lista_de_frequencias)) && ($frequencia_repetida === false); $contador_2++)
                {
                    if($lista_de_frequencias[$contador_2] == $frequencia)
                    {
                        $frequencia_repetida = $lista_de_frequencias[$contador_2];
                    }
                }

                array_push($lista_de_frequencias, $frequencia);

            }
        }

        echo('Resultado de duas estrelas: ' . $frequencia_repetida);



?>