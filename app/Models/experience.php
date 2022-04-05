<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 * 
 * @property string $Cin
 * @property string|null $Nom_Etp
 * @property string|null $Intitule_Poste
 * @property Carbon|null $Date_Debut
 * @property Carbon|null $Date_Fin
 * @property string|null $Description_Ex
 * @property int $ID_Exp
 * 
 * @property Candidat $candidat
 *
 * @package App\Models
 */
class Experience extends Model
{
	protected $table = 'experiences';
	protected $primaryKey = 'ID_Exp';
	public $timestamps = false;

	protected $dates = [
		'Date_Debut',
		'Date_Fin'
	];

	protected $fillable = [
		'Cin',
		'Nom_Etp',
		'Intitule_Poste',
		'Date_Debut',
		'Date_Fin',
		'Description_Ex'
	];

	public function candidat()
	{
		return $this->belongsTo(Candidat::class, 'Cin');
	}
}
