<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends BaseModel implements SluggableInterface{

	use SluggableTrait;

	protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

	protected $fillable = [];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';


	// has-to-many to tags
	public function tags() {
		return $this->belongsToMany('Tag');	
	}

	// has-to-many to tags
	public function photos() {
		return $this->belongsToMany('Photo');	
	}



}
