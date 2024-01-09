<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportstaf extends Model
{
    use HasFactory;
    protected $table = 'staff_reports';

    protected $fillable = [
        'waktu',
        'judul',
        'user_id',
        'lead_id',
        'detail',
        'file',
        'status',
    ];
    
    public function staff()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lead()
    {
        return $this->belongsTo(User::class, 'lead_id');
    }
}
