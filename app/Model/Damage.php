<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    public $table = 'champion_damage';
    public $fillable = [
		'attack',
        'attacked'
	];
    public $dates = [
        'edit_time',
        'reg_time'
    ];
    public $dateFormat = 'Y-m-d h:i:s';

	public function setCreatedAtAttribute($value) {
		$this->attributes['reg_time'] = \Carbon\Carbon::now()->timestamp;
	}
	public function setUpdatedAt($value) {
		$this->attributes['edit_time'] = \Carbon\Carbon::now()->timestamp;
	}
}
