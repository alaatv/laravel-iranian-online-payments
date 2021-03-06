<?php

namespace AlaaTV\Gateways\Contracts;

interface OnlinePaymentVerificationResponseInterface
{
    public function isSuccessfulPayment();
    
    public function getRefId();
    
    public function getCardPanMask();
    
    public function getCardHash();
    
    public function getMessages();
    
    public function isCanceled();
    
    public function isVerifiedBefore();
}