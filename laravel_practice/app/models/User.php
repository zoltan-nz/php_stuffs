<?php

use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\UserInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**    Protect against mass assignment */
    protected $fillable = array('username', 'email');

    /** Prevents from mass assignment */
    protected $guarded = array('id', 'password');

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'username'              => 'required|between:4,16',
        'email'                 => 'required|email',
        'password'              => 'required|alpha_num|min:8|confirmed',
        'password_confirmation' => 'required|alpha_num|min:8',
    );

    /** Automatically purge redundant data*/
    public $autoPurgeRedundantAttributes = true;

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}