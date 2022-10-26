<?php

/* Informe a fila a ser monitorada */
$queue = 'Fila1';

/* Importando classes */
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

/* Criando conexão e canal de comunicação */
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

/* Declarando a fila a ser monitorada */
$channel->queue_declare($queue, false, false, false, false);

echo " [*] Aguardando por mensagens. Para sair aperte CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] ', $msg->body, "\n";
};

/* Buscando por novas mensagens */
$channel->basic_consume($queue, '', false, true, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();

?>