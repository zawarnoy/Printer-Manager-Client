<?php


namespace App\Services\Server\Request;


interface ServerRequest
{
    function send(array $params);
}