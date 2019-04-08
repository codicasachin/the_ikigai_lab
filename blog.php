<html>
<head>
	<title>Write Blog</title>

<style type="text/css">

	.submit
	{
		margin-left:auto;
		margin-right:auto;
		display:block;
		margin-top:1.0%;
		margin-bottom:10%;
		padding: 7px 7px;
        width: 10%;

	}

	.blog
	{
		display: block;
        margin-left: auto;
        margin-right: auto;
	}

     .file
     {
          float:center;
          margin-left: 700px;
     }

</style>

<script>
	function fun()
	{
 	    var blog=document.getElementById("b1").value;
 	    document.write(blog);
 	}

</script>

</head>

<body>
<form action="blog.php" method="post" enctype="multipart/form-data">
	<textarea rows="6" cols="50" placeholder="Write your blog here..." class="blog" id="b1" name="b1"></textarea><br>
	<input type="file" name="img" required class="file" ><br>
	<input type="submit" value="submit" class="submit" name="submit"  />
</form>

<?php 
   if(isset($_POST['submit']))
   {
     
     $bloging=$_POST['b1'];
     $file=$_FILES['img']['name'];
     $temp_name=$_FILES['img']['tmp_name'];
     $con=mysqli_connect('localhost','root');

     if($con==true)
     {
     	mysqli_select_db($con,"blogs");

     	$q="INSERT into details(blog,img) values('$bloging','$temp_name')";
          $q2="SELECT blog, img from details where blog='$bloging'";
          $run=mysqli_query($con,$q2);
          $num=mysqli_num_rows($run);

          if($num < 1)
          {
               mysqli_query($con,$q);
     		?>
     		<script type="text/javascript">
     			alert("SUCESSFULLY REGISTERED BLOG");
     		</script>
     		<?php
          }
          else
          {
               ?>
               <script type="text/javascript">
                    alert("This Blog is Already Registered ");
               </script>
               <?php
          }
     }
     else
     {
          ?>
          <script type="text/javascript">alert("Connection Not done"); </script>
          <?php
     }
     mysqli_close($con);
}
else
{
     echo "Pta nahi kya probelm hai ";
}
 ?>

</body>
</html>
