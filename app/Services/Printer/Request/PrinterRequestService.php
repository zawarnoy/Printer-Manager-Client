<?php


namespace App\Services\Printer\Request;


use App\Services\Server\ServerCommunicationService;

class PrinterRequestService
{

    protected $responseParams;
    protected $communicationService;


    public function __construct(ServerCommunicationService $communicationService)
    {
        $this->communicationService = $communicationService;
        $this->responseParams = [];
    }


    // смари тут дохера можно написать про то как подгружаются в ларе сервисы
    // https://laravel.ru/docs/v5/providers
    // https://code.tutsplus.com/ru/tutorials/how-to-register-use-laravel-service-providers--cms-28966
    // вот две ссылки
    // ещё класс PriterRequestServiceProvider можешь скопировать
    public function handleRequest(array $params)
    {
        $this->communicationService->connect();
    }

    public function getResponseParams()
    {
        return $this->responseParams;
    }
}