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
 * @property string|null $telephone_rec
 * @property string|null $Adress
 * @property int $IDuser
 * 
 * @property User $user
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
		'ID_Rec' => 'int',
		'IDuser' => 'int'
	];

	protected $fillable = [
		'Pseudo',
		'photo_rec',
		'telephone_rec',
		'Adress',
		'IDuser'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'IDuser');
	}
}
