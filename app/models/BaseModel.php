<?php
use Carbon\Carbon;

class BaseModel extends Eloquent {

    public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('F d. Y'); //Change the format to whichever you desire
    }
}