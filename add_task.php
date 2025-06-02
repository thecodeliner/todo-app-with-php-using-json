<?php
    $file_path = 'todo.json';
    //check if file exists
        
        
        
    if($_SERVER['REQUEST_METHOD']=="POST"){
        
        $json_file = file_get_contents($file_path);
        
        $data = json_decode($json_file, true);
        
        
        $task= $_POST['task'];
        
        //default timezone
        date_default_timezone_set('Asia/Dhaka'); // 
        //data to write as array
        $data []= [
            'id'    => time(),
            'task'  => $task,
            'status'=> 'pending',
            'time'  => date('h:i A'),
            'date'  => date('m/d/Y') 
        
        ];
        $reverse = array_reverse($data);
        
        //encode data to json format
        $json_data = json_encode($reverse, JSON_PRETTY_PRINT);
        
        //file create and put data in to file
       if(file_put_contents($file_path, $json_data)){
        
            $msg = "Task added successfully";
            header('location: index.php');
            exit;
            
       }else{
           $msg = "Task not added";
       }
        
        
        
        
    }
    
    

?>