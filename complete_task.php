<?php
    
    //json file
     $file_path = 'todo.json';
     
    if (isset($_GET['id'])){
        
        $taskId = $_GET['id'];
        
    //read json file   
    $data = file_get_contents($file_path);
    //decode json to array
    $jsonData = json_decode($data, true);
    
   // print_r($jsonData);
    
   $updated = false;
   
   //edit task status
    
    foreach ($jsonData as &$jData){
        if ($jData['id'] == $taskId){
            $jData['status'] = 'completed';
            $updated = true;
            break;
        }
    }
    if ($updated){
         ;
        file_put_contents($file_path, json_encode($jsonData, JSON_PRETTY_PRINT));
         header('location: index.php');
        exit;
    }
        
    }
    

?>