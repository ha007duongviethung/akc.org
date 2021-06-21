<?php
    $url = "https://marketplace.akc.org/puppies/akita?";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1000);

    $content = curl_exec($curl);
    preg_match_all('/<script>(.*?)window.marketplace = (.*?)app(.*?):(.*?)<\/script>/si', $content, $matches);
    $arr = json_encode($matches[4][0]);
    print_r($matches[4][0]);
    curl_close($curl);