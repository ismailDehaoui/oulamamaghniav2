<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = "admin";

    // protected $fillables  = [
    //     'id', 
    //     'first_name', 
    //     'last_name', 
    //     'type',
    //     'vendor_id',
    //     'mobile',
    //     'email' ,
    //     'password',
    //     'image',
    //     'status'
    // ];

    public function getCategory(){
        return $this->belongsTo('App\Models\quransCategoriesStudents','id');
    }
}
