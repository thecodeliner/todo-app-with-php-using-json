<?php

    $filePath = "data.json";
    
    $data = [
        
       [ 'name'      => 'Sharif',
        'email'     => 'demo@email.com',
        'skill'     => 'php'],
        
        [ 'name'      => 'John',
        'email'     => 'john@email.com',
        'skill'     => 'Laravel']
        
        ];
        
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        
        if (file_put_contents($filePath, $jsonData)){
            echo "file write successfully";
        }else{
            echo "wrong file format";
        }
    


    if (file_exists($filePath)){
        
        // read the data.json file data
        $jsonData = file_get_contents($filePath);
        
        // decode json data in to associative array
        $data = json_decode($jsonData, true);
        
        
        foreach ($data as $datas){
        echo    "<h3> Name: ". $datas['name']. "</h3>" ;
        echo    "<h3> email: ". $datas['email']. "</h3>" ;
        echo    "<h3> skill: ". $datas['skill']. "</h3>" ;
            
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
    }else{
        echo "File not found";
    }


?>