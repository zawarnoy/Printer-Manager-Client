<?php


namespace App\Services\Printer\Request;


use App\Exceptions\CommunicationException;
use App\Exceptions\ConnectionException;
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
        // Смотришь ServerCommunicationService
        try {
            // подключаемся к серваку
            $this->communicationService->connect();
            $this->communicationService->analyzeParams($params);
            // отправляем на него запрос
            $this->communicationService->sendRequest();
        } catch (CommunicationException $communicationException) {

        } catch (ConnectionException $connectionException) {
            echo 'pezda, ne mogu sdelat connect';
        } catch (\InvalidArgumentException $invalidArgumentException) {
            echo 'huevie argumenti';
        }
    }

    public function getResponseParams()
    {
        return $this->responseParams;
    }
}