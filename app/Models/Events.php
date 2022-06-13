<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory, Sortable;

    protected $table = 'events';

    protected $fillable = ['title', 'start_date', 'end_date', 'description', 'status'];

    public $sortable = ['title', 'start_date', 'end_date'];
}
