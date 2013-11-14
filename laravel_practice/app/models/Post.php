<?php

use LaravelBook\Ardent\Ardent;

class Post extends Ardent {

    protected $fillable = array('body');

    public function user()
    {
        return $this->belongsTo('User');
    }

    public static $rules = array(
        'body'      =>  'required',
        'user_id'   =>  'required'
    );

    public static $factory = array(
        'body'      =>  'text',
        'user_id'   =>  'factory|User'
    );

    protected $table = 'posts';

}