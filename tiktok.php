<?php


var_dump($_POST['hashtagtiktok']);


if (isset($_POST['hashtagtiktok'])) {
    include __DIR__."../vendor/autoload.php";
    $api = new \Sovit\TikTok\Api();
    
    $arrayHashtag = explode(',', $_POST['hashtagtiktok']);
    
    foreach ($arrayHashtag as $hashtag) {
        $result = $api->getChallengeFeed($hashtag);

        //var_dump(count($result->items));

        echo "<br>";
        echo "Hashtag : <label class='text-success'>".$hashtag."</label><br>";

        if (isset($result->info->detail->stats->videoCount) || isset($result->info->detail->stats->viewCount)) {

            if ($result->info->detail->stats->videoCount == 0 || $result->info->detail->stats->videoCount == 1 ) {
                $videoCount = count($result->items);
            }else{
                $videoCount = $result->info->detail->stats->videoCount;
            }

            echo "Nombre de vidéos : <label class='text-success'>".$videoCount."</label><br>";
            echo "Nombre de vues : <label class='text-success'>".$result->info->detail->stats->viewCount."</label><br>";
        }else{
            echo "<label class='text-warning'>Veuillez attendre quelques minutes avant de réessayer.</label><br>";
        }
        

    }
};