<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
      <table border = "1">
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Edit</td>
         </tr>
         <?php foreach ($users as $user) { ?>
         <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->name ?></td>
            <td><a href = 'delete/<?php echo $user->id ?>'>Delete</a></td>
         </tr>
         <?php } ?>
      </table>
   </body>
</html>