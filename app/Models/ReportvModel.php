<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportvModel extends Model
{
    use HasFactory;

    protected $table = 'report_vaksin';
    protected $guarded = ['id_reportv'];
}
