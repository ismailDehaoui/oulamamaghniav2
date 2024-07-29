<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranStudants extends Model
{
    use HasFactory;

    public function quranSubscriptions()
    {
        return $this->belongsTo(QuranSubcription::class, 'quran_student_id');
    }
}
