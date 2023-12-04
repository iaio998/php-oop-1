<?php
include __DIR__ . "/Genre.php";
class Movie
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $origial_language;
    public Genre $genre;

    function __construct($id, $title, $overview, $vote, $lang, $img, $genre)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $lang;
        $this->origial_language = $img;
        $this->genre = $genre;
    }
    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star text-warning"></i>' : '<i class="fa-regular fa-star text-danger"></i>';
        }
        $template .= '</p>';
        return $template;
    }
    public function printCard()
    {
        $title = $this->title;
        $content = substr($this->overview, 0, 100) . "...";
        $custom = $this->getVote();
        $image = $this->poster_path;
        $genre = $this->genre->name;
        include __DIR__ . "/../Views/card.php";
    }
}
$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];
$genreString = file_get_contents(__DIR__ . '/genre_db.json');
$genreList = json_decode($genreString, true);
$genres = [];
foreach ($genreList as $item) {
    $genres[] = new Genre($item);
}
$action = new Genre('Action');
foreach ($movieList as $item) {
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language'], $genres[rand(0, count($genres) - 1)]);
}
// var_dump($movies[0]);
// var_dump($genreList);
?>