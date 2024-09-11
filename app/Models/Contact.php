<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_no',
        'email',
        'owner_id',
    ];

    public function adder(){
        return $this->belongsTo(User::class, 'adder_id');
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
