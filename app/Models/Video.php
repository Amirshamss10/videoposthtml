<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Video extends Model
{
    use HasFactory;
    protected $guarded = null;
    
    public function  getRouteKeyName() {
        return "url";
    }
    public function getLenghtInHumnAttribute() {
        return date("i:s", $this->lenght);
    }
    public function getCreatedAtAttribute($value) {
        $object = new Verta($value);
        return($object->formatDifference());
    }
    public function RelatedVideos(int $count = 6) {
     return Video::all()->random($count);
    }
}
