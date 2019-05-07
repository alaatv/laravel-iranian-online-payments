<?php

namespace AlaaTV\Gateways\Contracts;

interface OnlinePaymentRedirectionUriInterface
{
    public function getRedirectUrl(): string;
    
    public function getMethod(): string;
    
    public function getInput(): array;
}