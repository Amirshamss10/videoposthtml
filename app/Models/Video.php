<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Video extends Model
{
    use HasFactory;
    protected $guarded = null;
    public function getLenghtAttribute($value) {
        return date("i:s", $value);
    }
    public function getCreatedAtAttribute($value) {
        $object = new Verta($value);
        return($object->formatDifference());
    }
}
