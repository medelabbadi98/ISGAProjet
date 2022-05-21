<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Offre
 * 
 * @property int $Id_Offre
 * @property int|null $Id_CT
 * @property int|null $ID_Sec
 * @property int|null $CIN_rec
 * @property string|null $Intitule
 * @property Carbon|null $Date_Exp
 * @property string|null $Description_offre
 * @property Carbon|null $Date_pub
 *
 * @package App\Models
 */
class Offre extends Model
{
	protected $table = 'offres';
	protected $primaryKey = 'Id_Offre';
	public $timestamps = false;

	protected $casts = [
		'Id_CT' => 'int',
		'ID_Sec' => 'int',
		'CIN_rec' => 'string'
	];

	protected $dates = [
		'Date_Exp',
		'Date_pub'
	];

	protected $fillable = [
		'Id_CT',
		'ID_Sec',
		'CIN_rec',
		'Intitule',
		'Date_Exp',
		'Description_offre',
		'Date_pub'
	];
}
