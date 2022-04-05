<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contrat
 * 
 * @property int $Id_CT
 * @property string|null $Type_CT
 *
 * @package App\Models
 */
class Contrat extends Model
{
	protected $table = 'contrats';
	protected $primaryKey = 'Id_CT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id_CT' => 'int'
	];

	protected $fillable = [
		'Type_CT'
	];
}
