<?php

namespace App\Http\Controllers;

use App\Services\Printer\Request\PrinterRequestService;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $requestService;

    public function __construct(PrinterRequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function index(Request $request)
    {
        $this->requestService->handleRequest($request->all());
        return view('index', $this->requestService->getResponseParams());
    }

}