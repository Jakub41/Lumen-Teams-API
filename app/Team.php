<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'title'
  ];

  public function users()
	{
		return $this->belongsToMany(User::class, 'users_teams');
	}
}
