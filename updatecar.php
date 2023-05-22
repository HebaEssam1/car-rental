<?php 
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>View Cars</title>
        <link rel="stylesheet" href="style1.css">  
         <link rel="stylesheet" href="assets/images/">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">


       <style>

    body {


  margin-left:50px;
    color: black;

   
    }
#sqra{
    margin:20px;
    padding:30px;
}

tr{

    border-style: solid;
}
#table{
    border-style: solid;

}
td{
   padding:10px;
    padding-left:30px;
}
#form1{
    margin-bottom:30px;
    display:float;
    float:right;

}

#search{
width:200px;
border-radius:5px;
height:30px;
    margin-bottom:30px;

}
#btn{

    height:30px;
    width:70px;
    margin:40px;
    float:right;
    color:blue;
}
#btn2{

height:30px;
width:70px;
margin:40px;
float:right;
color:blue;
}
#btn.hover{
    color:skyblue;
}
</style>        
    </head>

    <body>
        <?php

        $sql = "SELECT * FROM Car as c JOIN Location as l ON c.LocID=l.LocID ";
        $result=mysqli_query($conn,$sql);
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
        
   ?> 

    <section>
        <h1 id="h1" style="padding:30px;">View Cars</h1>
        <form method="POST" action="addnewcar.html" name="form"> 
          <input id="btn" style="width:100px;height:40px;" type="submit" value="Add Car" name="add"/>
          </form >

        <form id="form1" action="searchCars.php" class="search" style="margin:auto;max-width:300px"> 
        <input id="search" type="text" placeholder="Search.." name="search">
             <button type="submit"><i class="fa fa-search"></i></button>
        </form>



        <!-- Construct table-->
        <table id="table">
            <tr>
            <th id="sqra">Plate ID</th>
            <th id="sqra">Model</th>
            <th id="sqra">Year</th>
            <th id="sqra">Status</th>
            <th id="sqra">InService</th>
            <th id="sqra">Color</th>
            <th id="sqra">Rental price</th>
            <th id="sqra">Country</th>
            <th id="sqra">City</th>
           
            <th id="sqra">Image</th>
            <th id="sqra">Action</th>

            </tr>
            <!-- fetch data from rows ,loop till end of data-->
            <?php   
                while($row = mysqli_fetch_array($result))
                {
             ?>
            <tr id="td">
                <!--fetch data from each row of every column-->
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
        
            <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
            <td id="sqrd"><a href="editCar.php?id=<?php echo $row['PlateID']; ?>"><i class='fa fa-edit'></i></a></td>
            </tr>
          
            <?php
                }
             ?>
        </table>
    </section>
    
    <form method="POST" action="admin.html" name="form"> 
           <input id="btn2" style="width:90px;height:30px;" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>