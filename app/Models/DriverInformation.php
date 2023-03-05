<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverInformation extends Model
{
    use HasFactory;

    protected $table='driver_information';

    protected $fillable=['passport','certificate','employment_book','tex_passport','user_id'];
}
