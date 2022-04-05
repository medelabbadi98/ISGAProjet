<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Secteur
 * 
 * @property int $Id_Sec
 * @property string|null $Nom_Sec
 *
 * @package App\Models
 */
class Secteur extends Model
{
	protected $table = 'secteurs';
	protected $primaryKey = 'Id_Sec';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id_Sec' => 'int'
	];

	protected $fillable = [
		'Nom_Sec'
	];
}
