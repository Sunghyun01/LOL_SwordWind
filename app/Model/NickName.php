<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NickName extends Model
{
    public $table = 'champion_nick_name';
    public $fillable = [
		'nick_name'
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
