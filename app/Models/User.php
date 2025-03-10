<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Artikel;
use App\Models\Pengumuman;
use App\Models\Donasi;
use App\Models\Jenis;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

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

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
    public function donasi()
    {
        return $this->hasMany(Donasi::class);
    }
    // public function daftardonasi()
    // {
    //     return $this->belongsTo(Donasi::class);
    // }
}
