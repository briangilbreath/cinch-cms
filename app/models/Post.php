<?php

class Post extends BaseModel{

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
