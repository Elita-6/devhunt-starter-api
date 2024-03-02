<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Utilisateur extends Model
{
    use HasFactory, HasApiTokens, Notifiable, HasUlids;

    protected $fillable = [
        "id",
        "username",
        "firstName",
        "lastName",
        "profileUrl",
        "typeProvider",
        "email",
        "password"
    ];

    protected $primaryKey = "id";

    protected $keyType = "string";


    protected $hidden = ["password"];

    protected $casts = [
        "password" => "hashed",
        "created_at" => "datetime:Y-m-d H:m:i",
    ];


    public function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H-m-i');
    }

}
