<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Postuler
 * 
 * @property string $Cin
 * @property int $Id_offre
 * @property Carbon|null $Date_post
 *
 * @package App\Models
 */
class Postuler extends Model
{
	protected $table = 'postulers';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id_offre' => 'int',
	];

	protected $dates = [
		'Date_post'
	];

	protected $fillable = [
		'Date_post',
	];
}