<?php

namespace AlaaTV\Gateways\Contracts;

use AlaaTV\Gateways\RedirectData;

interface OnlineGateway
{
    public function generateAuthorityCode(string $callbackUrl, IranianCurrency $cost, string $description, $orderId = null);

    public function getAuthorityValue(): string;
    
    public function generatePaymentPageUriObject($refId): RedirectData;
    
    public function verifyPayment(IranianCurrency $amount, $authority): OnlinePaymentVerificationResponseInterface;
}