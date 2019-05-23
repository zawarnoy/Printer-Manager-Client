<?php


namespace App\Services\Server;


use App\Exceptions\ConnectionException;
use App\Services\Server\Request\InfoServerRequest;
use App\Services\Server\Request\ServerRequest;
use InvalidArgumentException;
use Workerman\Worker;

class ServerCommunicationService
{

    // Будем использовать этот мод для получения инфы о принтерах
    const MODE_GET_INFO = 1;

    // Непосредственно для печати файлов
    const MODE_PRINT_FILE = 2;

    protected $mode;

    /**
     * @var ServerRequest
     */
    protected $request;
    protected $params;

    protected $socket;

    public function __construct()
    {
    }

    /**
     * @param string $ip
     * @param string $socket
     */
    public function connect($ip = '127.0.0.1', $socket = '2134')
    {
        if (!($this->socket = stream_socket_client("tcp://$ip:$socket"))) {
            throw new ConnectionException();
        }
    }

    /**
     * @param array $params
     */
    public function analyzeParams(array $params)
    {
        if (!isset($params['mode'])) {
            throw new InvalidArgumentException();
        }

        switch ($params['mode']) {
            case 'info':
                $this->mode = ServerCommunicationService::MODE_GET_INFO;
                $this->request = new InfoServerRequest();
                break;
            case 'print':
                $this->mode = ServerCommunicationService::MODE_PRINT_FILE;
                $this->request = new InfoServerRequest();
                break;
        }

        $this->params = $params;
    }

    public function sendRequest()
    {
        $response = [];

        if ($this->request) {
            $response = $this->request->send($this->params);
        }

        return $response;
    }

    /**
     * @param mixed $mode
     */
    public function setMode($mode): void
    {
        $this->mode = $mode;
    }
}