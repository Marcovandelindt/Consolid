<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Fitbit Access Token
     *
     * @return string
     */
    public function getFitbitAccessToken(): string
    {
        return $this->fitbit_access_token;
    }

    /**
     * Set Fitbit Access Token
     *
     */
    public function setFitbitAccessToken($accessToken)
    {
        $this->fitbit_access_token = $accessToken;
    }

    /**
     * Get Fitbit refresh token
     *
     */
    public function getFitbitRefreshToken()
    {
        return $this->fitbit_refresh_token;
    }

    /**
     * Set Fitbit Refresh Token
     *
     */
    public function setFitbitRefreshToken($refreshToken)
    {
        $this->fitbit_refresh_token = $refreshToken;
    }

    /**
     * Get Fitbit Expiry
     *
     */
    public function getFitbitAccessTokenExpiry()
    {
        return $this->fitbit_access_token_expiry;
    }

    /**
     * Set Fitbit Access Token
     *
     */
    public function setFitbitAccessTokenExpiry($expiry)
    {
        $this->fitbit_access_token_expiry = $expiry;
    }
}
