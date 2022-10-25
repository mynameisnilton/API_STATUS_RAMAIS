<?php


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://192.168.9.245:9000/webservice/status_ramais?ramal=2000",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

// Transformar o conteúdo XML em Objeto
    $xml = simplexml_load_string($response);

// Retorna o codigo
    if($xml->retorno_codigo == 00) {

//Imprimi os valores com valor do codigo "00"
   echo "Nome: " . $xml->nome . "<br>" . "Ramal: " . $xml->ramal . "<br>" . " posição: " . $xml->posicao . "<br>" . " status " . $xml->status;

    }

//Imprimi os valores com valor do codigo diferente de "00"
else {
    echo "Ramal:" . $xml->ramal . "<br>" . " Descrição: " . $xml->retorno_descricao; 

    }
