<?php

namespace App\Services\InternetServiceProvider;

use App\Services\InternetServiceProvider\InternetCalTotalInterface;
use App\Services\InternetServiceProvider\InternetSetMonthInterface;

class Ooredoo implements InternetSetMonthInterface, InternetCalTotalInterface
{
    protected $operator = 'ooredoo';
    
    protected $month = 0;
    
    protected $monthlyFees = 150;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
        return $this;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}