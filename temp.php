<?php
    $url = "http://localhost:305/Heroes_Pluss/AKC/breed.json";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1000);

    $content = curl_exec($curl);
    $arr = json_decode($content, true);
    $content = $arr['state']['app']['breed_info'][0]['content'];
    preg_match_all('/<li>(.*?)<strong>(.*?): <\/strong>(.*?)<\/li>/si', $content, $matches);

    echo "<pre>";
    print_r($matches[2]);
    echo "</pre>";
    echo "<br>";
    echo "<pre>";
    print_r($matches[3]);
    echo "</pre>";
    curl_close($curl);
