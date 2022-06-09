
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
                        <label data-source="mydatasource" for="hashtagtiktok">hashtag Tiktok</label>
                        <input type="text" placeholder="hashtag1,hashtag2,hashtag3,..." class="form-control" name="hashtagtiktok" id="has   htagtiktok" value="<?= (isset($_POST['hashtagtiktok'])) ? $_POST['hashtagtiktok'] : '' ?>">
                        <small id="hashtagtiktok" class="form-text text-muted">Ecrire les hastags séparer par une virgule (5 MAX)</small>
                    </div>
                    <button type="submit" class="btn btn-primary" value="cc">Submit</button>
                </form>
                </body>

                <?php 

                    if (isset($_POST['hashtagtiktok'])) {
                        error_reporting(0);

                        include __DIR__."../vendor/autoload.php";
                        $api = new \Sovit\TikTok\Api();

                        $arrayHashtag = explode(',', $_POST['hashtagtiktok']);

                        $username=shell_exec("query user" );
                        $username=trim(strstr($username, "TEMPS SESSION"));
                        $aUser = explode(" ",$username);
                        $aUser = array_filter($aUser);
                        $aUser = array_values($aUser);
                        $file = fopen("log.txt", "a");
                        fwrite($file, "username :".$aUser[2]."; date :".$aUser[7]." ".$aUser[8]."; Liste des Hashtag :".$_POST['hashtagtiktok']."\n");
                        fclose($file);
                        
                        foreach ($arrayHashtag as $hashtag) {
                            $result = $api->getChallengeFeed($hashtag);
                            if (empty($result->items) && $result != false) {
                                echo "<br>";
                                echo "Le hashtag : <label class='text-success'>".$hashtag."</label> n'hésite pas.<br>";
                            }else{
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
                        }
                    };

                ?>
            </div>
</html>