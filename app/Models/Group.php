<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GroupNumbers;
use App\User;

class Group extends Model
{
    protected $fillable = [
        'group_name', 'user_id', 'created_at', 'updated_at'
    ];

    public function numbers()
    {
        return $this->hasMany(GroupNumbers::class, "group_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
