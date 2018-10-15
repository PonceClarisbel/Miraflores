<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class OrderController extends BaseSoapController
{
    private $service;
    public function index() {
        /*
        $client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'timeout'  => 1000.0,
        ]);
        $response = $client->request('GET', 'posts');
        $orders = json_decode($response->getBody()->getContents());
        return view('orders.index');
        */
        try {
            self::setWsdl('http://192.168.2.201:85/WS/MBAToMobile.asmx?wsdl');
            $this->service = InstanceSoapClient::init();
            //dd($this->service->__getFunctions());
            $response = $this->service->ObtenerPedidos(['pedido' => '17650']);
            //$orders = $this->loadXmlStringAsArray($response->ObtenerPedidosResult);
            dd($response->ObtenerPedidosResult);
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
