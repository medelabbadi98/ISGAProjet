<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competence
 * 
 * @property string|null $Cin
 * @property string|null $Description
 * @property int $ID_Cmp
 * @property string $libelle
 * 
 * @property Candidat|null $candidat
 *
 * @package App\Models
 */
class Competence extends Model
{
	protected $table = 'competences';
	protected $primaryKey = 'ID_Cmp';
	public $timestamps = false;

	protected $fillable = [
		'Cin',
		'Description',
		'Libelle'
	];

	public function candidat()
	{
		return $this->belongsTo(Candidat::class, 'Cin');
	}
}
