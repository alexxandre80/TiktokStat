
<!DOCTYPE html>   
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/tiktok.js"></script>
        <title>Tiktok Stat</title>
    </head>
    <body>
        <div class="container">

                <h1>Tiktok Stat</h1>
                <p class="text-danger">Attendre entre 1 et 2 minutes si on obtient "false" en résultat</p>

                <form action="#" method="post">
                    <div class="form-group">
                        <label for="hashtagtiktok">hashtag Tiktok</label>
                        <input type="text" class="form-control" name="hashtagtiktok" id="hashtagtiktok" value="<?= (isset($_POST['hashtagtiktok'])) ? $_POST['hashtagtiktok'] : '' ?>">
                        <small id="hashtagtiktok" class="form-text text-muted">Ecrire les hastags séparer par une virgule (5 MAX)</small>
                    </div>
                    <button type="submit" class="btn btn-primary" value="cc">Submit</button>
                </form>
                </body>

                <?php 

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

                ?>
            </div>
</html>