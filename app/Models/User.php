<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function Role()
    {
        return $this->belongsTo(Role::class, 'role_id')
            ->select(['id', 'name']);
    }

    public static function getUser($posted_data = array())
    {
        $query = User::latest()->with('role');

        if (isset($posted_data['id'])) {
            $query = $query->where('users.id', $posted_data['id']);
        }
        if (isset($posted_data['role_id'])) {
            $query = $query->where('users.role_id', $posted_data['role_id']);
        }
        if (isset($posted_data['email'])) {
            $query = $query->where('users.email', $posted_data['email']);
        }
        if (isset($posted_data['name'])) {
            $query = $query->where('users.name', 'like', '%' . $posted_data['name'] . '%');
        } 
	    if (isset($posted_data['status'])) {
            $query = $query->where('users.status', $posted_data['status']);
        } 
        
        $query->getQuery()->orders = null;
        if (isset($posted_data['orderBy_name'])) {
            $query->orderBy($posted_data['orderBy_name'], $posted_data['orderBy_value']);
        } else {
            $query->orderBy('users.id', 'ASC');
        }

        
        if (isset($posted_data['paginate'])) {
            $result = $query->paginate($posted_data['paginate']);
        } else {
            if (isset($posted_data['detail'])) {
                $result = $query->first();
            } else if (isset($posted_data['count'])) {
                $result = $query->count();
            } else if (isset($posted_data['array'])) {
                $result = $query->get()->ToArray();
            } else {
                $result = $query->get();
            }
        }
        // echo '<pre>';
        // print_r($result->toSql());
        // exit;
        return $result;
    }

    public static function saveUpdateUser($posted_data = array())
    {
        if (isset($posted_data['update_id'])) {
            $data = User::find($posted_data['update_id']);
        } else {
            $data = new User;
        }

        if (isset($posted_data['role_id'])) {
            $data->role_id = $posted_data['role_id'];
        }
        if (isset($posted_data['name'])) {
            $data->name = $posted_data['name'];
        } 
        if (isset($posted_data['email'])) {
            $data->email = $posted_data['email'];
        }
        if (isset($posted_data['password'])) {
            $data->password = Hash::make($posted_data['password']);
        }
        if (isset($posted_data['status'])) {
            $data->status = $posted_data['status'];
        }
        
        $data->save();
        return $data;
    }

    public function deleteUser($id=0)
    {
        $data = User::find($id);
        return $data->delete();
    }
}