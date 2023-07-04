<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time_start',
        'time_end',
        'venue',
        'thumbnail',
        'description',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }

    public function ticketTypes()
    {
        return $this->hasMany(TicketTypes::class);
    }
}
