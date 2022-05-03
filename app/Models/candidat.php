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
 * @property string|null $Photo_C
 * @property string|null $Nom
 * @property string|null $Prenom
 * @property string|null $Adresse
 * @property string|null $Tel_C
 * @property int $IDuser
<<<<<<< HEAD
 * @property int|null $about
=======
 * @property string|null $About
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
 * 
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
<<<<<<< HEAD
		'IDuser' => 'int',
		'about' => 'int'
=======
		'IDuser' => 'int'
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
	];

	protected $fillable = [
		'Photo_C',
		'Nom',
		'Prenom',
		'Adresse',
		'Tel_C',
		'IDuser',
<<<<<<< HEAD
		'about'
=======
		'About'
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
	];

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
