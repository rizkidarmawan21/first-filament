<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingLetter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(Member::class, 'sender_id');
    }
}
