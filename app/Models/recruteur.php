<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recruteur
 * 
 * @property int $CIN
 * @property string|null $About
 * @property string|null $Nom
 * @property string|null $Prenom
 * @property string|null $photo_rec
 * @property string|null $telephone_rec
 * @property string|null $Adresse
 * @property int $IDuser
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Recruteur extends Model
{

	
	protected $table = 'recruteurs';
	protected $primaryKey = 'CIN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CIN' => 'string',
		'IDuser' => 'int'
	];

	protected $fillable = [
		'Nom',
		'About',
		'Prenom',
		'photo_rec',
		'telephone_rec',
		'Adresse',
		'IDuser'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IDuser');
	}
}