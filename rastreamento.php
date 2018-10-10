<?php

    $post = array('Objetos' => 'AA123456789BR');
    // iniciar CURL
    $ch = curl_init();
    // informar URL e outras funções ao CURL
    curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
    // Acessar a URL e retornar a saída
    $output = curl_exec($ch);
    // liberar
    curl_close($ch);
    // Imprimir a saída
    echo $output;
    echo utf8
?>