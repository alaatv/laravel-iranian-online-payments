<?php

namespace AlaaTV\Gateways;

use AlaaTV\Gateways\Contracts\IranianCurrency;

class Money implements IranianCurrency
{
    /**
     * @var int amount stored internally in rials
     */
    private $money;
    
    /**
     * Money constructor.
     *
     * @param $money
     */
    private function __construct($money)
    {
        $this->money = $money;
    }
    
    public static function fromRials($amount)
    {
        return new static($amount);
    }
    
    public static function fromTomans($amount)
    {
        return new static($amount * 10);
    }
    
    public function tomans()
    {
        return $this->money / 10;
    }
    
    public function rials()
    {
        return $this->money;
    }
}