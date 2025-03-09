<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //use HasFactory;
    // Add fillable properties
    protected $fillable = ['employeeNameSurname', 'senderNameSurname',
        'receiverNameSurname', 'senderTransaction', 'receiverTransaction', 'price',  'date'];

}
