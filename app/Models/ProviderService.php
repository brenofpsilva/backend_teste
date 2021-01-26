<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProviderService
 * 
 * @property int $provider_id
 * @property int $service_id
 * 
 * @property Provider $provider
 * @property Service $service
 *
 * @package App\Models
 */
class ProviderService extends Model
{
	protected $table = 'provider_service';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'provider_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'provider_id',
		'service_id'
	];

	public function provider()
	{
		return $this->belongsTo(Provider::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
