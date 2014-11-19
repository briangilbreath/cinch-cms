<?php

class Tag extends \Eloquent {
	protected $fillable = [];


	// has-to-many to posts
	public function posts() {
		return $this->belongsToMany('Post');
	}
}