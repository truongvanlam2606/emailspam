<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    const ROLE_SCHOOL = 1;
    const ROLE_PARENT = 2;
    const ROLE_STUDENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id','status','street', 'city', 'country', 'postal_code', 'image', 'phone_number'
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

    public function getNameAttribute() {

        return $this->first_name .' ' .$this->last_name;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function respondentUserTeams()
    {
        return $this->hasMany(RespondentUserTeam::class, "user_id", "id");
    }

    public function myNow()
    {
        return $this->hasOne(MyNow::class);
    }

    public function settingNotification()
    {
        return $this->hasOne(SettingNotification::class, 'user_id');
    }

    public function myGoals()
    {
        return $this->hasMany(MyGoal::class);
    }
    
    public function heartScore()
    {
        return $this->hasOne(HeartScore::class);
    }

    public function myBeat()
    {
        return $this->hasOne(MyBeat::class);
    }
}
