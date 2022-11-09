<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>items</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

        table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
    </style>
</head>
<body>

    <button id="myBtn">add new</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">
    
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
        <form enctype="multipart/form-data" role="form" method="POST" action="<?php echo e(route('store_ingredient')); ?>">
          <?php echo csrf_field(); ?>  
          <div class="input-group">
            <span class="input-group-addon">name</span>
            <input id="weight" type="text" class="form-control" name="name" placeholder="Additional Info">
          </div>
          <div class="input-group">
            <span class="input-group-addon">image</span>
            <input id="image" type="file" class="form-control" name="image" placeholder="Additional Info">
          </div>
          <input name="item_id" value="<?php echo e($item_id); ?>" >
          <input name="folderName" value="<?php echo e($folderName); ?>" hidden>
          <div class="input-group">
            <button type="submit" class="btn ">add</button>
         </div>

        </form>
      </div>
    </div>
    <table style="width: 100%">
        <tr>
            <th>name</th>
            <th>image</th> 
          </tr>
          <tbody>
            <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          <tr>
            <td><?php echo e($ingredient->name); ?></td>
            <td><img style="width: 40px " src="<?php echo e(asset('storage/'.$ingredient->image)); ?>"><?php echo e($folderName); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
    </table>
</body>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
</html><?php /**PATH /Users/lamah_company/Desktop/laravel/Humburgeno/resources/views/ingredients.blade.php ENDPATH**/ ?>