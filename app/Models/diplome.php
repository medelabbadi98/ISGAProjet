<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Diplome
 * 
 * @property string $Cin
 * @property string|null $Type_Dip
 * @property string|null $Etablissement
 * @property string|null $Specialites
 * @property string|null $_Option
 * @property Carbon|null $Annee_obtention
 * @property int $ID_Dip
 * 
 * @property Candidat $candidat
 *
 * @package App\Models
 */
class Diplome extends Model
{
	protected $table = 'diplomes';
	protected $primaryKey = 'ID_Dip';
	public $timestamps = false;

	protected $dates = [
		'Annee_obtention'
	];

	protected $fillable = [
		'Cin',
		'Type_Dip',
		'Etablissement',
		'Specialites',
		'_Option',
		'Annee_obtention'
	];

	public function candidat()
	{
		return $this->belongsTo(Candidat::class, 'Cin');
	}
}
