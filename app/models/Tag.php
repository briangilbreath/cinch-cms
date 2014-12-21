<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Tag extends \Eloquent implements SluggableInterface{
	
	use SluggableTrait;

	protected $fillable = [];


	protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );


	// has-to-many to posts
	public function posts() {
		return $this->belongsToMany('Post');
	}
}