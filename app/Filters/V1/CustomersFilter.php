<?php

namespace App\Filters\V1;


use App\Filters\ApiFilter;
class CustomersFilter extends ApiFilter{
    protected $safeParms = [
        'name' =>['eq'],
        'type' =>['eq'],
        'email' =>['eq'],
        'city' =>['eq'],
        'state' =>['eq'],
        'address' =>['eq'],
        'postalCode' =>['eq'],
    ];
    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];
    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
    ];



}
