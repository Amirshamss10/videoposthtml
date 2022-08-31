<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Jalali\Jalali;
use App\Models\Category;
class Video extends Model
{
    use HasFactory;
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
    public function category() {
        return $this->belongsTo(Category::class); 
    }
    public function RelatedVideos(int $count) {
        return $this->category->getRandomVideos($count)->except($this->id);
    }
}

?>