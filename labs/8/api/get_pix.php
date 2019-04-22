<?php
  session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();

      case "GET":
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
            get_get_pix();
        break;
      case 'POST':
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");

        break;
      case 'PUT':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        break;
    }
    
    
    function get_get_pix()
    {
        $result["connection_status"] = "success";
        $pictures = fetch_images();
        foreach($pictures as $label => $value)
        {
            $result[$label] = $value;
        }
        echo json_encode($result);
    }
    function get_from_api() 
    {
        $curl_sess = curl_init();
        
        $key = "12231163-1e52dbaba5c2dea989e9f9eec";
        $search = "otter";
        //$search = $query
        $search = urlencode($search);
        $curlurl = "https://pixabay.com/api/?key=${key}&q=${search}";
        
        
        curl_setopt($curl_sess, CURLOPT_URL, $curlurl);
        curl_setopt($curl_sess,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl_sess,CURLOPT_HEADER, false);
        
        $results = curl_exec($curl_sess);
        
        //var_dump(json_decode($results));
        
        $err = curl_error($curl_sess);
        curl_close($curl_sess);
        if(!empty($err))
        {
            $data["fetched"] = false;
            return $data;
        }
        $output = json_decode($results, true);
        
        $name = 0;
        foreach($output["hits"] as $name=>$value)
        {
            $data[$name] = $value;
        }
        $data["fetched"] = true;
        
        return $data;
    }
    function fetch_images() //will need to support caching
    {
        $images = get_from_api();
        foreach($images as $id=>$image)
        {
            
            $temp["url"] = $image["webformatURL"];
            $returnable["images"][] = $temp;
        }
        
        $returnable;
        
        //webformatURL
        return $returnable;
    }
    
    
?>
