<?php

namespace AlaaTV\Gateways;

interface OnlineGateway
{
    public function generateAuthorityCode(string $callbackUrl, IranianCurrency $cost, string $description, $orderId = null);

    public function getAuthorityValue(): string;
    
    public function generatePaymentPageUriObject($refId): OnlinePaymentRedirectionUriInterface;
    
    public function verifyPayment(IranianCurrency $amount, $authority): OnlinePaymentVerificationResponseInterface;
}