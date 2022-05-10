<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $type
 * 
 * @property Collection|Candidat[] $candidats
 * @property Collection|Recruteur[] $recruteurs
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	

    protected $childTypes = [
        'Candidat' => Candidat::class,
        'Recruteur' => Recruteur::class,
    ];

	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'type'
	];

	public function candidats()
	{
		return $this->hasMany(Candidat::class, 'IDuser');
	}

	public function recruteurs()
	{
		return $this->hasMany(Recruteur::class, 'IDuser');
	}

  
    public function isCandidat(): bool
    {
        return $this->type === 'Candidat';
    }

    public function isRecruteur(): bool
    {
        return $this->type === 'Recruteur';
    }
}

