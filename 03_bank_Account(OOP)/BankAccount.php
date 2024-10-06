<?php

abstract class BankAccount
{
    // properties
    protected $Balance =0;
    public $APR;
    public $SortCode;
    public $FirstName;
    public $LastName;
    public  $Audit = array();
    protected $Locked = false;

    // method
    public function withDraw() {
        $transDate = new DateTime();
    }


}