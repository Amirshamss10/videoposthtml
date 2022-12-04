<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Hekmatinasser\Jalali\Jalali;
use App\Models\Category;
use App\Models\Comment; 

class Video extends Model
{
    use HasFactory, Likeable;
    protected $fillable = ["name", "url", "lenght", "thumbnail", "category_id"];
    
    public function  getRouteKeyName() {
        return "url";
    }
    public function getLenghtInHumnAttribute() {
        return date("i:s", $this->lenght);
    }
     public function getCreatedAtAttribute($value) {
        $object = new Jalali($value);
        return($object->formatDifference());
    }
    public function getCategoryNameAttribute() {
        return $this->category->name; 
    }
    public function getOwnerNameAttribute() {
        return $this->user?->name ?? "ناشناس"; 
    }
    public function getVideoUrlAttribute() {
        return "/storage/".$this->url; 
    }
    public function category() {
        return $this->belongsTo(Category::class); 
    }
    public function user() {
        return $this->belongsTo(User::class); 
    }
    public function RelatedVideos(int $count) {
        return $this->category->getRandomVideos($count)->except($this->id);
    }
    public function comments() {
        return $this->hasMany(comment::class)->orderBy("created_at", "desc");
    }
    public function scopeFilter(Builder $builder, array $data) {
        if(isset($data["lenght"]) && $data["lenght"] == 1) {
            $builder->where('lenght', '<', 60);
        }
        if(isset($data["lenght"]) && $data["lenght"] == 2 ) {
            $builder->whereBetWeen('lenght', [60,300]);
        }
        if(isset($data["lenght"]) && $data["lenght"] == 3) {
            $builder->where('lenght', '>', 300);
        }
        return $builder;
    }
    public function scopeSort(Builder $builder, array $data) {

        if(isset($data["sortBy"]) && $data["sortBy"] == "created_at" ) {
            $builder->orderBy("created_at", "desc"); 
        }
        if(isset($data["sortBy"]) && $data["sortBy"] == "lenght") {
            $builder->orderBy("lenght", "desc");
        }
        return $builder;
    }
}
?>  