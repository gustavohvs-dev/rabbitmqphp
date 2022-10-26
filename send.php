<?php

/* Parâmetros */
$data = json_decode(file_get_contents("php://input"),false);
$msgText = $data->nome . " : " . $data->mensagem;
$queue = "Fila1";

/* Importando classes */
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

/* Criando conexão e canal de comunicação */
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

/* Declarando fila */
$channel->queue_declare($queue, false, false, false, false);

/* Criando e enviando mensagem */
$msg = new AMQPMessage($msgText);
$channel->basic_publish($msg, '', $queue);

echo " [x] Enviado: ".$msgText."\n";

$channel->close();
$connection->close();

?>