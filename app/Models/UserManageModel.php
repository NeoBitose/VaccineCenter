<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManageModel extends Model
{
    use HasFactory;

    protected $table= 'user_management';
    protected $guarded = ['id_management'];
}
