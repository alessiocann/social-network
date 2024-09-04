<?php
    
    if($_POST['scelta'] === 'spotify'){
    //App key
    $client_id = "42e1dfdda47743c18337ef6c4e236d11";
    $client_secret = "80ddcc4fbc424d12b968b6841a1e4b30";
    // Richiesta token
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    //echo json_encode($result);
    //print_r(json_decode($result));
    curl_close($curl);
    
    // Utilizzo
    $token = json_decode($result)->access_token;
    $data = http_build_query(array("q" => $_POST['cerca'], "type" => "album"));
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
    $headers = array("Authorization: Bearer ".$token);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    echo "$result";
    //print_r(json_decode($result));
    curl_close($curl);
    }

    if($_POST['scelta'] === 'giphy'){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://api.giphy.com/v1/gifs/search?q=" .$_POST["cerca"]."&api_key=TrtuAq0z8mPxO6XH9rFLMkmbSgqcVxRv");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $api_return = curl_exec($curl);
        echo $api_return;
        curl_close($curl);
    }

?>