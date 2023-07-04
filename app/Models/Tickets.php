<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_code',
        'customers_id',
        'concerts_id',
        'status',
        'check_in_at',
        'ticket_types_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customers_id', 'id');
    }

    public function concert()
    {
        return $this->belongsTo(Concerts::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }

    public function timeout()
    {
        return $this->hasOne(TicketTimeou::class);
    }
}
