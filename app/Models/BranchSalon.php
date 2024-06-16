<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchSalon extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name', 'branch_address', 'branch_address', 'opening_time', 'closing_time', 'services'
    ];
}
