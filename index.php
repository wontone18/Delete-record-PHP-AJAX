<?php
include ("connection.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PHP Ajax Delete Record</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
     

     <div class="container">
     <div class="bodybox">
     <h1>PHP Ajax Product Delete</h1>

     <table cellpadding="10" class="table table-bordered">
    <thead>
    <tr>
    <th>Product name</th>
    <th>Action </th>

    </tr>
    </thead>
    <tbody>
    <?php
    $sql="select * from product order by id desc";
    $result=mysqli_query($con,$sql) or die("Error in sql query");

    while($row=mysqli_fetch_assoc($result)){
    ?>

    <tr class="showdata-<?php echo($row['id']);?>">
    <td> <?php echo($row['product_name']);?></td>
    <td>
    <a href="javascript:void();" onclick="Deletrecord(<?php echo($row['id']);?>)">
    <i class="far fa-trash-alt"></i></a></td>
</tr>
    <?php


    }
    ?>

    </tbody>


    </table>

 </div>

</div>
        
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>

    function Deletrecord(id){

        $.ajax({
            type:"post",
            url:"delete.php",
            data:"id="+id,
            success:function(html){


                $(".showdata-"+id).slideUp('fast');

               

            },
            beforeSend:function(){
                $(".showdata-"+id).css('background-color','#fb6c6c');


        }

})

        }




    </script>

    </body>
</html>