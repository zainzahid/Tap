<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

use App\Models\Group;
use App\Models\TappSentMsgLog;
use App\Models\TappSentMsg;
use App\Models\TappMsgReceive;
use App\Models\TappSentMsgFailed;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'balance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class, "user_id", "id");
    }
    public function sentMessages()
    {
        return $this->hasMany(TappSentMsgLog::class, "user_id", "id");
    }
    public function pendingMessages()
    {
        return $this->hasMany(TappSentMsg::class, "user_id", "id");
    }
    public function failedMessages()
    {
        return $this->hasMany(TappSentMsgFailed::class, "user_id", "id");
    }
    public function recievedMessages()
    {
        return $this->hasMany(TappMsgReceive::class, "user_id", "id");
    }
}
