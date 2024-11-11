<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'hospital_id'];

    public function hospital()
    {
        return $this->belongsTo(Hospitals::class);
    }
}
