<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';

    public $fillable = ['user_id','book_id','transaction_type','transaction_date','due_date','returned_date'];
    public $timestamps = true;
}
