<?php

class Post extends Eloquent {

    protected $fillable = array('body');

    public function user()
    {
        return $this->belongsTo('User');
    }

    protected $table = 'posts';

}