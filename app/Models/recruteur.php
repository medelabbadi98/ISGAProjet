<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recruteur
 * 
 * @property int $ID_Rec
 * @property string|null $Pseudo
 * @property string|null $photo_rec
 * @property string|null $Email_rec
 * @property string|null $Mot_de_pass_rec
 * @property string|null $telephone_rec
 * @property string|null $Adress
 *
 * @package App\Models
 */
class Recruteur extends Model
{
	protected $table = 'recruteurs';
	protected $primaryKey = 'ID_Rec';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_Rec' => 'int'
	];

	protected $fillable = [
		'Pseudo',
		'photo_rec',
		'Email_rec',
		'Mot_de_pass_rec',
		'telephone_rec',
		'Adress'
	];
}
