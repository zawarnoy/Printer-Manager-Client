<?php


namespace App\Services\Printer\Request;


class PrinterRequestService
{
    public function __construct()
    {
    }


    // смари тут дохера можно написать про то как подгружаются в ларе сервисы
    // https://laravel.ru/docs/v5/providers
    // https://code.tutsplus.com/ru/tutorials/how-to-register-use-laravel-service-providers--cms-28966
    // вот две ссылки
    // ещё класс PriterRequestServiceProvider можешь скопировать
    public function handleRequest(array $params)
    {

    }

    public function getResponseParams()
    {
        return [];
    }
}