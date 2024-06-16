<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'branch_id', 'user_name', 'branch_name', 'phone_number', 'services', 'date' ,'time_start', 'time_end'
    ];
}
