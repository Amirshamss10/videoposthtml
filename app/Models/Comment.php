<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Jalali\Jalali;
class Comment extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ["user_id", "body"];

    public function getCreatedAtHumanAttribute() {
        return (new jalali($this->created_at))->formatDifference();
    }
    public function video() {
        return $this->belongsTo(Video::class);  
    }
    public function user() {
        return $this->belongsTo(User::class);    
    }
}
