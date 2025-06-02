<?php
    $file_path = 'todo.json';
        //check if file exists
        if (!file_exists($file_path)){
            
           $msg = "Json file not found!";
        }
        
        
        //get json file
        $json_file = file_get_contents($file_path);
        
        //json file to array
        $data = json_decode($json_file, true);
        
        
            //filter
         $filteredData = $data;
    
    // Filter logic
  
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
  
  <title>To-Do List</title>
  
</head>

<div class="todo-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="todo-header">📅 To-Do List</h4>
      
      <select id="filterStatus" class="form-select form-select-sm filter-select w-50" name="select">
        <option value="all">All</option>
        <option value="pending" >Pending</option>
        <option value="completed" >Completed</option>
      </select>
     
    </div>

    <form class="add-task-form mb-4" method="POST" action="add_task.php">
      <input type="text" placeholder="Add your task" name="task" />
      <button type="submit" name="submit">ADD</button>
    </form>

    <!-- Task 1 -->
    <div class="all-task">
    <?php
        foreach ($filteredData as $newData):
    ?>
    <div class="todo-item" data-status="<?php echo $newData['status']; ?>">
      <div>
        <div class="d-flex align-items-center">
          <input class="form-check-input me-2" type="checkbox" <?php echo $newData['status'] == 'completed'? 'checked disabled' : '';?>/>
          <span class="todo-text <?php echo $newData['status'] == 'completed'? 'completed':'';?>"><?php echo $newData['task']?></span>
        </div>
        <div class="todo-details">
          <?php echo $newData['time'].", ".$newData['date']?> - Status: <span class="<?php echo $newData['status'] == 'completed'? 'stcomplete':'';?>"> <?php echo $newData['status']?></span>
        </div>
      </div>
      <div style="display:flex;">
         <form method="GET" action"complete_task.php">
        <button class="btn-icon btn-checkmark"><a href="complete_task.php?id=<?php echo $newData['id']?>">✅</a></button>
        </form> 
        
        <form method="GET" action"complete_task.php">
        <button class="btn-icon del-btn"><a href="delete.php?id=<?php echo $newData['id'];?>">❎️</a></button>
        </form> 
      </div>
    </div>

    <?php endforeach;?>
   </div>
   
    
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/brands.min.js"  referrerpolicy="no-referrer"></script>
    
    <script>
    document.getElementById('filterStatus').addEventListener('change', function () {
    const selected = this.value;
    const items = document.querySelectorAll('.todo-item');
    items.forEach(item => {
        const status = item.getAttribute('data-status');
        if (selected === 'all' || status === selected) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});
</script>

</body>
</html>
