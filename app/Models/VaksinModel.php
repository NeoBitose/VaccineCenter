<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinModel extends Model
{
    use HasFactory;

    protected $table = 'vaksin';
    protected $guarded = ['id_vaksin'];
}
