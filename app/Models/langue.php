<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Langue
 * 
 * @property int $Id_LG
 * @property string|null $Nom_Lg
 *
 * @package App\Models
 */
class Langue extends Model
{
	protected $table = 'langues';
	protected $primaryKey = 'Id_LG';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id_LG' => 'int'
	];

	protected $fillable = [
		'Nom_Lg'
	];
}
