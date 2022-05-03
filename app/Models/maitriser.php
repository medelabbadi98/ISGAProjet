<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Maitriser
 * 
 * @property string $CIN
 * @property int $ID_Lg
 * @property string|null $Niveau
 *
 * @package App\Models
 */
class Maitriser extends Model
{
	protected $table = 'maitrisers';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_Lg' => 'int'
	];

	protected $fillable = [
		'Niveau'
	];

	public function candidat()
	{
		return $this->belongsTo(Candidat::class, 'Cin');
	}
}
