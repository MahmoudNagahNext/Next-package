<?php

namespace nextdev\nextdashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status_id',
        'priority_id',
        'category_id',
        'creatore_type',
        'creator_id',
        'assigned_type',
        'assigned_id'
    ];
}
