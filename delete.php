<?php
    //load json file
    $file_path = 'todo.json';
    
    
    
    if(isset($_GET['id'])){
        
          $delId = $_GET['id'];
          
          //read json file
          //$json_data = file_get_contents($file_path);
          $data = json_decode(file_get_contents($file_path), true);
          
          foreach($data as $key => $task){
              if ($task['id'] == $delId){
                  
                  unset($data[$key]);
                  break;
              }
              //print_r($key);
          }
     
     $new_data = json_encode($data, JSON_PRETTY_PRINT);
     file_put_contents($file_path, $new_data);
     
     header('Location: index.php');
    exit;
        
    }
    // get json file
echo "<pre>";
print_r($task[$key]);
echo "</pre>";
?>