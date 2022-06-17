<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterModel extends Model
{
    use HasFactory;

    protected $table = 'vaksin_center';
    protected $guarded = ['id_center'];
}
