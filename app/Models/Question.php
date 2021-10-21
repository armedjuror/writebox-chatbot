<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'type', 'hint'
    ];

    protected $casts = [
        'hint' => 'array',
        'rule' => 'array'
    ];

    /**
     * Hint :-
     *      Options
     * Rule : -
     *      Key level 1 :- Test Controller Name,  next(Default), switch
     *  ['next'=>array('input'=>'', 'cases'=>array('default'=>''))]
     *      Key level 2 :- Array( input => , cases=> Array( case1 => action1, case2=> action2 ) )
     */

}
