<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
		'description',
		'dead_at',
		'progress',
	];

	protected $dates = ['dead_at'];
}
