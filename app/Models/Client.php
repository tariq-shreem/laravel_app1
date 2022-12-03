<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone','email'];

    public static function roules(){

        return [
            'name'=>'required|min:5|max:20',
            'phone'=>'required|min:11',
            'email'=>'required|email|max:20',
        ];
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    protected $hidden = ['created_at', 'updated_at'];

}
