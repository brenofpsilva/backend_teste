<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Provider[] $providers
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'description',
		'price'
	];

	public function providers()
	{
		return $this->belongsToMany(Provider::class);
	}
}
