<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCenterModel extends Model
{
    use HasFactory;

    protected $table = 'admin_center';
    protected $guarded = ['id_user_center'];
}
