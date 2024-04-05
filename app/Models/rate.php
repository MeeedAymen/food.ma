<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'comment',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
