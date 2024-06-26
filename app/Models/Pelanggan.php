<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kontak',
        'alamat',
        'email'
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
