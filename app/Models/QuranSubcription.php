<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranSubcription extends Model
{
    use HasFactory;

    protected $dates = [
        'next_date_renewal'
    ];    
    
    protected $dateFormat = 'Y-m-d';
}
