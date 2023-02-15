<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter{

    protected $columnMap = [
        'postalCode' => 'postal_code',

    ];

    protected $safeParms = [
        'customer_id' =>['eq'],
        'amount' =>['eq','lt','gt','lte','gte'],
        'status' =>['eq','ne'],
        'billed_date' =>['eq','lt','gt','lte','gte'],
        'paid_date' =>['eq','lt','gt','lte','gte'],

    ];

    protected $operatorMap = [
        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=> '!='
    ];

}
