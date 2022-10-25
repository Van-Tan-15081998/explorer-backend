<?php

namespace Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model {

    const CREATED_USER = 'created_user_id';
    const UPDATED_USER = 'updated_user_id';

    protected $fillableColumns = ['*'];
    protected $auth_user = null;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->auth_user = Auth::check() ? Auth::user()->id : 0;
    }

    public function setCreatedUpdatedUsers()
    {
        if ($this->exists) {
            $this->setAttributeValue(static::UPDATED_USER, $this->auth_user);
        } else {
            $this->setAttributeValue(static::CREATED_USER, $this->auth_user);
            $this->setAttributeValue(static::UPDATED_USER, $this->auth_user);
        }
    }

    public static function getCreatedUser()
    {
        // vt: get user created record
        return static::CREATED_USER;
    }

    public static function getUpdatedUser()
    {
        // vt: get user updated record
        return static::UPDATED_USER;
    }

    public function setAttributeValue($key, $value)
    {
        if (Schema::hasColumn($this->getTable(), $key)) {
            return parent::setAttribute($key, $value);
        }
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|\Core\Entities\BaseModel
     */
    public function newEloquentBuilder($query)
    {
        return new BaseBuilder($query);
    }
}
