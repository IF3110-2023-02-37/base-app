<?php
    function getCss($styleFileName) {
        $link = "<link rel='stylesheet' href='http://localhost/App/Public/css/" . $styleFileName . "'>";
        echo $link;
    }

    function getScript($script){
        echo "<script src='http://localhost/App/Public/js/" .  $script . "' defer></script>";
    }
    
    function getAudio($audio) {
        echo "http://localhost/App/Public/audio/" . $audio;
    }

    function getImg($image) {
        echo "http://localhost/App/Public/image/" . $image;
    }

    function getCover($image) {
        echo "http://localhost/App/Public/image/cover/" . $image; 
    }

    function getArtistImg($image) {
        echo "http://localhost/App/Public/image/artist/" . $image;
    }

    function getProfile($image) {
        echo "http://localhost/App/Public/image/profile/" . $image;
    }