<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id'];


    public function getkeluarga(): BelongsTo
    {
        return $this->belongsTo(KeluargaModel::class, 'keluarga', 'keluarga_id');
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(RolesModel::class, 'role', 'role_id');
    }

    public function getpengumuman()
    {
        return $this->hasMany(PengumumanModel::class, 'pengumuman_id');
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


}
