<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function deal(){
        return $this->hasone(Deal::class);
    }
    protected $fillable = [
    'name',
    'course',
    'create_year',
    'body',
    ];
    
    public function getPaginateByLimit(int $limit_count = 9)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getPaginateByLimit2(int $limit_count = 9)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->whereHas('user', function ($q) {
     $q->where('school', "=", Auth::user()->school);})->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getPaginateByLimit3(int $limit_count = 9)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->user()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

// hasone→外部キーを渡す方
// belongsto→外部キーを持っている方
