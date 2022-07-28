<?php 
    namespace App\Http\Controllers; 
    use App\Models\Video;

    class login extends Controller 
    {
        public function Index() {
            echo "<h3 style=color:green>Index Page</h3>";
        }
        public function show_video() {
            $video = Video::find(rand(1,20));
            $data =  json_decode($video,true);
            return view("Videos", [
                "data"=>$data
            ]);
        }
    }
    class login1 extends Controller 
    {
        public function show_class() {
            echo __CLASS__; 
        }
    }
?>