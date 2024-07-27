<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function memberPosition()
    {
        return $this->hasMany(MemberPosition::class);
    }

    public function memberRank()
    {
        return $this->hasMany(MemberRank::class);
    }

    public function letterAssignments()
    {
        return $this->hasMany(LetterAssignment::class);
    }
}
