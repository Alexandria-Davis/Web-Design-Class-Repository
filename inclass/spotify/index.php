<?php
    include "private.php";
    
    $album_type = "SINGLE";
    
    if (empty($_SESSION["spotify_token"]))
    {
        $sSession = curl_init();
        $curlurl = "https://accounts.spotify.com/authorize?";
        $data["client_id"] = $spotify_client_id;
        $data["response_type"] = $spotify_client_secret;
        $data["redirect_uri"] = "#";
        
        
        foreach ($data as $key => $val)
        {
            $curlurl = $curlurl."&".$key."=".$val;
        }
        
        echo $curlurl;
        curl_setopt($sSession, CURLOPT_URL, $curlurl);
        curl_setopt($sSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($sSession,CURLOPT_HEADER, false);
        
        $results = curl_exec($sSession);
        
        var_dump($results);
        
        $err = curl_error($sSession);
        curl_close($sSession);
        echo $results;
        echo $err;
    }
    /*
    $cSession = curl_init();

    //seturl
    curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/artists/1vCWHaC5f2uS3yhpwWbIA6/albums?album_type=${album_type}&offset=20&limit=10");

    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);

//step3
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//step5
echo $results;
    //set -X GET
  */  
?>