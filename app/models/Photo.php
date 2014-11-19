<?php

class Photo extends \Eloquent {
	protected $fillable = ['title,fileName'];

	// has-to-many to posts
	public function photos() {
		return $this->belongsToMany('Post');
	}
}