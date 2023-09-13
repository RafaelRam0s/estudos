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

        /*
            abcdef 
                0 pares
                0 trios
            bababc
                1 par
                    a
                1 trio
                    b
            abbcde
                1 par
                    b
            abcccd
                1 trio
                    c
            aabcdd
                2 pares
                    a
                    d
            abcdee
                1 par
                    e
            ababab
                2 trios
                    a
                    b

            4 palavras apresentaram ao menos 1 par
            3 palavras apresentaram ao menos 1 trio
            
            4x3 = 12
        */

        $quantidade_par = 0;
        $quantidade_trio = 0;

        // Percorrer toda a lista
        for ($contador_1 = 0; $contador_1 < sizeof($conteudo); $contador_1++)
        {
            $palavra_chave = $conteudo[$contador_1];

            $lista_de_letras_ja_verificadas = [];
            $par_recebe = false;
            $trio_recebe = false;

            // Percorrer toda a palavra
            for ($contador_2 = 0; $contador_2 < strlen($palavra_chave); $contador_2++)
            {
                $letra = $palavra_chave[$contador_2];
                $letra_verificada = false;
                
                // Verificar se a letra já foi analisada
                for (
                    $contador_3 = 0; 
                    ($contador_3 < sizeof($lista_de_letras_ja_verificadas)) && ($letra_verificada === false); 
                    $contador_3++)
                {
                    if ($letra == $lista_de_letras_ja_verificadas[$contador_3])
                    {
                        $letra_verificada = true;
                    }
                }

                if ($letra_verificada === false)
                {
                    array_push($lista_de_letras_ja_verificadas, $letra);

                    // Ver quantas vezes essa letra se repete e pontuar adequadamente

                    $quantidade_de_repeticao = (sizeof(explode($letra, $palavra_chave)) - 1);

                    if ($quantidade_de_repeticao == 2 && $par_recebe === false)
                    {
                        $par_recebe = true;
                    } else if ($quantidade_de_repeticao == 3 && $trio_recebe === false)
                    {
                        $trio_recebe = true;
                    }

                    /* Deu errado, retornando 8788 e é muito alto // 8788 = 13 trios * 26 pares * 26 unicos

                        if ( is_null($lista_de_repeticoes[$quantidade_de_repeticao]) == true )
                        {
                            $lista_de_repeticoes[$quantidade_de_repeticao] = [];
                        }

                        for (
                            $contador_4 = 0; 
                            ($contador_4 < sizeof($lista_de_repeticoes[$quantidade_de_repeticao])) && ($letra_verificada === false);
                            $contador_4++)
                        {
                            if ($letra == $lista_de_repeticoes[$quantidade_de_repeticao][$contador_4])
                            {
                                $letra_verificada = true;
                            }
                        }

                        if ($letra_verificada === false)
                        {
                            array_push($lista_de_repeticoes[$quantidade_de_repeticao], $letra);
                        }
                    */

                    /* Deu errado, retornando 338 e é muito baixo // 338 = 13 trios * 26 pares 
                        if ($quantidade_de_repeticao == 2)
                        {

                            for ($contador_4 = 0; ($contador_4 < sizeof($lista_de_pares)) && ($letra_verificada === false); $contador_4++)
                            {
                                if ($letra == $lista_de_pares[$contador_4])
                                {
                                    $letra_verificada = true;
                                }
                            }

                            if ($letra_verificada === false)
                            {
                                array_push($lista_de_pares, $letra);
                            }

                        } else if ($quantidade_de_repeticao == 3)
                        {
                            for ($contador_4 = 0; ($contador_4 < sizeof($lista_de_trios)) && ($letra_verificada === false); $contador_4++)
                            {
                                if ($letra == $lista_de_trios[$contador_4])
                                {
                                    $letra_verificada = true;
                                }
                            }

                            if ($letra_verificada === false)
                            {
                                array_push($lista_de_trios, $letra);
                            }
                            
                        }
                    */
                }
                
            }

            if ($par_recebe === true)
            {
                $quantidade_par++;
            }
            if ($trio_recebe === true)
            {
                $quantidade_trio++;
            }

        }

        $soma_de_verificacao = $quantidade_par * $quantidade_trio;

        echo('Resultado de uma estrela: ' . $soma_de_verificacao);


        
        // Desafio 2
        $palavra_comum_por_um_caracter = false;

        // Cada palavra
        for ($contador_1 = 0; $contador_1 < sizeof($conteudo) && ($palavra_comum_por_um_caracter === false); $contador_1++)
        {
            $palavra_chave = $conteudo[$contador_1];

            // Cada letra
            for ($contador_2 = 0; $contador_2 < strlen($palavra_chave) && ($palavra_comum_por_um_caracter === false); $contador_2++)
            {
                $palavra_a_pesquisar = '' . substr($palavra_chave, 0, (0 + $contador_2)) . substr($palavra_chave, (1 + $contador_2));
                
                // Cada palavra
                for ($contador_3 = 0; $contador_3 < sizeof($conteudo) && ($palavra_comum_por_um_caracter === false); $contador_3++)
                {
                    if ($contador_1 != $contador_3)
                    {
                        $palavra_a_comparar = '' . substr($conteudo[$contador_3], 0, (0 + $contador_2)) . substr($conteudo[$contador_3], (1 + $contador_2));

                        if ($palavra_a_comparar == $palavra_a_pesquisar)
                        {
                            $palavra_comum_por_um_caracter = $palavra_a_pesquisar;
                        }
                    }
                }
            }
        }

        echo('Resultado de duas estrelas: ' . $palavra_comum_por_um_caracter);

?>