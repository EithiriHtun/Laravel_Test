<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
      <table border = 1>
         <tr>
            <td>ID</td>
            <td>Name</td>
         </tr>
        <?php foreach ($users as $user) { ?>
         <tr>
            <td><?php echo $user->id ?> </td>
            <td><?php echo $user->name ?></td>
         </tr>
         <?php } ?>
      </table>
   </body>
</html>