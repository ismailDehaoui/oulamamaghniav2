<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quransCategoriesStudents extends Model
{
    use HasFactory;

    public function secretary()
    {
        return $this->belongsTo(Secretary::class, 'quran_school_id');
    }
}
