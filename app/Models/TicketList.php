<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketList extends Model
{
    use HasFactory;

    protected $table = 'ticket_lists';
    protected $fillable = ['event_name', 'currency', 'quantity_initial', 'quantity_available', 'date_added', 'status'];
    public $timestamps = true;
}
