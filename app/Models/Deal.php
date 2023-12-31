<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Deal extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function item(){
        return $this->belongsTo(Item::class)->withTrashed();
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function messages(){
        return $this->hasMany(Message::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 9)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
