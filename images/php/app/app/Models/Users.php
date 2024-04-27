<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Http\Request;

class Users extends Model
{

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'state', 'age', 'address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'age' => 'integer',
    ];

    public function scopeFilter($query, Request $request)
    {
        if ($request->has('char_column')) {
            $query->where('state', $request->input('char_column'));
        }

        if ($request->has('varchar_column')) {
            $query->where('name', $request->input('varchar_column'));
        }

        if ($request->has('text_column')) {
            $query->where('address', 'like', $request->input('text_column'));
        }

        if ($request->has('int_column')) {
            $query->where('age', $request->input('int_column'));
        }

        if ($request->has('age_min')) {
            $query->where('age', '<=', $request->input('age_min'));
        }

        if ($request->has('age_max')) {
            $query->where('age', '>=', $request->input('age_max'));
        }

        return $query;
    }
}
