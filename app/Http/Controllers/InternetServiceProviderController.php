<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;
use App\Traits\ApiResponser;

class InternetServiceProviderController extends Controller
{
    use ApiResponser;

    public function getMptInvoiceAmount(Request $request, Mpt $internetServiceProvider)
    {
        $amount = $internetServiceProvider->setMonth($request->get('month') ?: 1)->calculateTotalAmount();
        return $this->success(200, $amount);
    }
    
    public function getOoredooInvoiceAmount(Request $request, Ooredoo $internetServiceProvider)
    {
        $amount = $internetServiceProvider->setMonth($request->get('month') ?: 1)->calculateTotalAmount();
        return $this->success(200, $amount);
    }
}
