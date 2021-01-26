<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $photo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Provider extends Model
{
	protected $table = 'providers';

	protected $fillable = [
		'name',
		'email',
		'phone',
		'photo'
	];

	public function services()
	{
		return $this->belongsToMany(Service::class);
	}
}
