<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'rol_id',
        'user',
        'name',
        'active',
        'email',
        'created_at',
        'password',
    ];



    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }


    public function person()
    {
        return $this->hasOne(Person::class, 'user_id'); // 'user_id' es la clave foránea en la tabla 'personas'
    }

    public function employee(){
        return $this->hasOne(Employee::class,'user_id');
    }
   
    
}
