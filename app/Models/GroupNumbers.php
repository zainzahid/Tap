<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class GroupNumbers extends Model
{
    protected $fillable = [
        'group_id', 'sms_number', 'created_at', 'updated_at'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
