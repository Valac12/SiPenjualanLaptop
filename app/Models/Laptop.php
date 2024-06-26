<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'merek',
        'prosesor',
        'ram',
        'penyimpanan',
        'layar',
        'harga',
    ];

    public function stok(): HasOne
    {
        return $this->hasOne(Stok::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
