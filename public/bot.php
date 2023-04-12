<?php

//Configuracion del bot
$token = '';//token telegram
$path = 'https://api.telegram.org/bot'.$token;
$server = '';//servidor
$endpoint = '/setWebhook?url='.$server;
$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$userName = $update["message"]["chat"]["first_name"]; 
$message = $update["message"]["text"]; 

$chatId = $update['message']['chat']['id'];

//Funcion para enviar mensajes
function sendMessage($chatId, $response){
    
   global $path;
        
  file_get_contents($path.'/sendMessage?chat_id='.$chatId."&text=".$response);
}

function primeraMayuscula($texto){
  return ucfirst(strtolower($texto));
}

//Supermercado

$pasillo1 = [
  'Carne',
  'Queso',
  'Jamon',
];

$pasillo2 = [
  'Leche',
  'Yogurth',
  'Cereal',
];

$pasillo3 = [
  'Bebidas',
  'Jugos',
];

$pasillo4 = [
  'Pan',
  'Pasteles',
  'Tortas',
];

$pasillo5 = [
  'Detergente',
  'Lavaloza',
];
// Comandos



if(strpos($message, "/start") === 0){

  $response = 'Estimado ['.$userName.'] Bienvenido a nuestro super online, ';
  $response = $response.'donde podrá encontrar todo lo que necesita para su día a día ';
  $response = $response.'puede consultar por un producto y yo su bot virtual le dará respuesta ;) ';
  $response = $response.'fui programada por Manuel Ignacio Urra Castro, RUT: 19.604.651-8 ';
  $response = $response.'correo manuelurra2497@gmail.com';

  sendMessage($chatId, $response);

}

//Pasillo uno
if(in_array(primeraMayuscula($message), $pasillo1)){

  sendMessage($chatId, 'El producto '.primeraMayuscula($message).' se encuentra en el "Pasillo 1"');

}

//Pasillo dos
else if(in_array(primeraMayuscula($message), $pasillo2)){

  sendMessage($chatId, 'El producto '.primeraMayuscula($message).' se encuentra en el "Pasillo 2"');

}

//Pasillo tres
else if(in_array(primeraMayuscula($message), $pasillo3)){

  sendMessage($chatId, 'El producto '.primeraMayuscula($message).' se encuentra en el "Pasillo 3"');

}

//Pasillo cuatro
else if(in_array(primeraMayuscula($message), $pasillo4)){

  sendMessage($chatId, 'El producto '.primeraMayuscula($message).' se encuentra en el "Pasillo 4"');

}

//Pasillo cinco
else if(in_array(primeraMayuscula($message), $pasillo5)){

  sendMessage($chatId, 'El producto '.primeraMayuscula($message).' se encuentra en el "Pasillo 5"');

}

else{

  sendMessage($chatId, 'No entiendo la pregunta, pruebe nombrando el producto, ejemplo; carne')

}


?>