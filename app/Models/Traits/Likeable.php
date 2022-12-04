<?php 
namespace App\Models\Traits ;

use App\Models\Like;  
use App\Models\User; 

trait Likeable 
{
    public function likes() 
    {   
        return $this->morphMany(Like::class, "likeable"); 
    }

    public function getLikeCountAttribute() {
        return $this->likes()->where("vote","1")->count(); 
 
    }

    public function getdisLikeCountAttribute() {
        return $this->likes()->where("vote","0")->count(); 
    }

    public function likedBy(User $user) {
        if(!$this->islikedBy($user)) {
            return $this->likes()
            ->create([
                "user_id" => $user->id, 
                "vote" => 1,
            ]);
        }
    }

    public function dislikedBy(User $user) {
        if(!$this->isDislikedBy($user)) {
            return $this->likes()
            ->create([
                "user_id" => $user->id, 
                "vote" => 0,
            ]);
        } 
    }
    public function islikedBy(User $user) {
        return $this->likes()
        ->where("vote", 1)
        ->where("user_id", $user->id)
        ->exists(); 
    } 
    public function isDislikedBy(User $user) {
        return $this->likes()
        ->where("vote", 0)
        ->where("user_id", $user->id)
        ->exists();
    }   
}
?>