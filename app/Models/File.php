<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable =[
        'file_name',
        'received_from',
        'receive_date',
        'returned_to',
        'return_date',
        'remarks'
    ];

    protected $casts =[
        'receive_date' => 'date',
        'return_date' => 'date',
    ];
}
