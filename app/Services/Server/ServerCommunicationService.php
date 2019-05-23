<?php


namespace App\Services\Server;


class ServerCommunicationService
{

    // Будем использовать этот мод для получения инфы о принтерах
    const MODE_GET_INFO = 1;

    // Непосредственно для печати файлов
    const MODE_PRINT_FILE = 2;

    public function __construct()
    {
    }

    public function connect($ip = '', $socket = '')
    {

    }

    public function sendRequest()
    {
        $response = '';


        return $response;
    }
}