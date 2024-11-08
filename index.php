<?php

# ADICIONANDO O AUTOLOAD DO COMPOSER
require_once 'vendor/autoload.php';

# INSTANCIANDO O OBJETO MPDF
$mpdf = new \Mpdf\Mpdf();

# JSON COM DADOS PARA MUDAR 
# "variavel" : "texto"
$json = '{
   "var":"Isso não estava aqui antes"
}';

# TRANSFORMANDO O JSON EM TEXTO
$obj = json_decode($json,true);

# PEGANDO O CONTEÚDO DO ARQUIVO meu_html.html
$proposta = file_get_contents('meu_html.html');



# FUNÇÃO PARA MODIFICAR AS VARIÁVEIS DO ARQUIVO
function replace_file($arr, $v_file){

   # LOOP PARA ACHAR CADA UMA DAS VARIÁVEIS DO ARQUIVO HTML 
   # E MUDAR ELAS PARA A CHAVE JSON CORRESPONDENTE
   # {{var}} no HTML muda para "Isso não estava aqui antes"

	foreach ($arr as $key => $value) {
      $v_file = str_replace('{{'.$key.'}}', $value, $v_file);
	}

   # retorno do arquivo modificado com as variáveis preenchidas
	return $v_file;
}

# CHAMANDO A FUNÇÃO E RETORNANDO O ARQUIVO PRONTO
$html = replace_file($obj, $proposta);

# ADICIONANDO O ARQUIVO NO OBJETO MPDF
$mpdf->WriteHTML($html);

# OUTPUT NO NAVEGADOR
$mpdf->Output();
?>