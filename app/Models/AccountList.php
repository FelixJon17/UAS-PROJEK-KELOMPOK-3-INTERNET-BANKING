<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountList extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'accountNumber',
        'fullname',
    ];
}
