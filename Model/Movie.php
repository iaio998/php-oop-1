<?php
class Movie
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $origial_language;

    function __construct($id, $title, $overview, $vote, $lang, $img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote;
        $this->poster_path = $lang;
        $this->origial_language = $img;
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
        $content = $this->overview;
        $custom = $this->getVote();
        $image = $this->poster_path;
        include __DIR__ . "/../Views/card.php";
    }

}
$movieString = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movieString, true);
$movies = [];
foreach ($movieList as $item) {
    $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $item['original_language']);
}
// var_dump($movies[0]);
?>