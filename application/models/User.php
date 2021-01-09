<?php

class User extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'users';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'id',
        'username',
        'email',
        'role_slug',
        'password',
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array(
        'password'
    );

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = array(
        'created_at',
        'updated_at',
        'deleted_at',
    );
}