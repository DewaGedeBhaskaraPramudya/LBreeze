<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Nama','ticket_id','Ticket','Alamat'
    ];

    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }
}
