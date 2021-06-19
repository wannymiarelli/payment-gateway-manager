<?php
namespace AtlasByte\Contracts;

interface IPaymentOutcome
{

    public function getPaymentToken () : string;
    public function getPaymentId () : string;
    public function isExecuted () : bool;

}