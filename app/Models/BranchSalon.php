<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BranchSalon extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name', 'branch_address', 'opening_time', 'closing_time', 'services', 'picturePath'
    ];

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }

    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
