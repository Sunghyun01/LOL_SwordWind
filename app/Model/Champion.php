<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    public $table = 'champions';
    public $fillable = [
		'name'
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
    public function nickName(){
        return $this->hasMany(\App\Model\NickName::class);
    }
    public function damage($col = null){
        if($col){
            return $this->damage()->get($col);
        }
        return $this->hasMany(\App\Model\Damage::class);
    }

    public function resolveRouteBinding($value){
	    return $this->find($value,['id','name']);
	}
}
