<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 
class SberController extends Controller
{
    public function createMouth()
    {
         $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://3dsec.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'g6rm4j6gr525f19pcrmof7r5l7', 
            'orderNumber' => $OrderId,
            'amount' => "10000",
            'returnUrl' => "http://teachhome.ru/"
        ]
    ]);

    $result= $res->getBody();
    return $result;
        
    }
    
    public function createThreeMouth()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://3dsec.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'g6rm4j6gr525f19pcrmof7r5l7', 
            'orderNumber' => $OrderId,
            'amount' => "27000",
            'returnUrl' => "http://teachhome.ru/"
        ]
    ]);

    $result= $res->getBody();
    
    return $result;
        
    }
    public function createHalfYear()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://3dsec.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'g6rm4j6gr525f19pcrmof7r5l7', 
            'orderNumber' => $OrderId,
            'amount' => "50000",
            'returnUrl' => "http://teachhome.ru/"
        ]
    ]);

    $result= $res->getBody();
    
    return $result;
        
    }
    public function createYear()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://3dsec.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'g6rm4j6gr525f19pcrmof7r5l7', 
            'orderNumber' => $OrderId,
            'amount' => "90000",
            'returnUrl' => "http://teachhome.ru/"
        ]
    ]);

    $result= $res->getBody();
    
    return $result;
        
    }
}
