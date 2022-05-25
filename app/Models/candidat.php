<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Candidat
 * 
 * @property string $CIN
 * @property string|null $About
 * @property string|null $Photo_C
 * @property string|null $Nom
 * @property string|null $Prenom
 * @property string|null $Adresse
 * @property string|null $Tel_C
 * @property int $IDuser
 * @property int|null $Id_sect
 * 
 * @property Secteur|null $secteur
 * @property User $user
 * @property Collection|Competence[] $competences
 * @property Collection|Diplome[] $diplomes
 * @property Collection|Experience[] $experiences
 *
 * @package App\Models
 */
class Candidat extends Model
{
	protected $table = 'candidats';
	protected $primaryKey = 'CIN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDuser' => 'int',
		'Id_sect' => 'int'
	];

	protected $fillable = [
		'About',
		'Photo_C',
		'Nom',
		'Prenom',
		'Adresse',
		'Tel_C',
		'IDuser',
		'Id_sect'
	];

	public function secteur()
	{
		return $this->belongsTo(Secteur::class, 'Id_sect');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'IDuser');
	}

	public function competences()
	{
		return $this->hasMany(Competence::class, 'Cin');
	}

	public function diplomes()
	{
		return $this->hasMany(Diplome::class, 'Cin');
	}

	public function experiences()
	{
		return $this->hasMany(Experience::class, 'Cin');
	}
}
