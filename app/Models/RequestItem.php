<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'born_on', 'street', 'document_purpose', 'document_type', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
