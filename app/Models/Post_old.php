<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use DateTimeImmutable;
class Post{
    public string $title;
    public DateTimeImmutable $date;
    public string $body;
    public string $sample;
    public string $path;

    public function __construct(string $title,DateTimeImmutable $date,string $body,string $sample,string $path){
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->sample = $sample;
        $this->path = $path;
    }
    public static function path_to_post($path) : Post{
        $doc = YamlFrontMatter::parseFile($path);
        $doc = new Post(
            $doc->matter('title'),
            DateTimeImmutable::createFromFormat('Y-m-d',$doc->matter('date')),
            $doc->body(),
            $doc->sample,
            $doc->path
        );
        return $doc;
    }


    public static function find($slug) : Post{
        $path = resource_path("html/".$slug.".html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return  Post::path_to_post($path);
    }

    public static function all() :array {
        /*return cache()->rememberForever("posts.all",fn() => collect(File::files(resource_path("html/")))->
            map(fn($file) => Post::path_to_post($file))->
            sortbyDesc('date')->
            all()
        );*/
        return collect(File::files(resource_path("html/")))->
            map(fn($file) => Post::path_to_post($file))->
            sortbyDesc('date')->
            all();
    }
}