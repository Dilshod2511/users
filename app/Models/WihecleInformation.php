<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WihecleInformation extends Model
{
    use HasFactory;

    protected $table="vehicle_information";

    protected $fillable=['truck_number','truck_brand','user_id','year','condition','fuel','number','capacity'];
}



