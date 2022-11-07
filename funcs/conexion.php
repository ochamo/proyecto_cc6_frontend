<?php

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
        case "GET":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
          if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
        case "DELETE":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
          if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
        // GET con query parameteres ?id=2 for example
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
          break;
    }
    // OPTIONS:

    if (isset($_SESSION["token"])) {
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'Authorization: Bearer ' . $_SESSION["token"]
      ));
    } else {
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
      ));
    }
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    // retorna la respuesta.
    return $result;
 }

 function sendFileToApi($url, $data) {
    $files_to_upload = array();
    for ($i = 0; $i < count($data["blob"]["name"]); $i++) {
        array_push($files_to_upload,
            array("$i" => new CurlFile(
                $_FILES['curl_image_upload']['tmp_name'],
                $_FILES['curl_image_upload']['type'],
                $_FILES['curl_image_upload']['name']
            ))
        );
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: multipart/form-data',
     ));

    curl_setopt($curl, CURLOPT_POSTFIELDS, $files_to_upload); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $server_result = curl_exec($curl);
	curl_close($curl);
    return $server_result;
 }

?>