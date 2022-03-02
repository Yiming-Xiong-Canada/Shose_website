<?php

if( isset( $_POST['submit'])){
	 
	 $name = $_POST['name'];
	 $price = $_POST['price'];
	 $rating = $_POST['rating'];
	 print_r( $_FILES );

	$uploaddir = __DIR__ . '/images/';
	$uploadfile = $uploaddir . basename($_FILES['img']['name']);
	$img = '';
 
	if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
	     $img = 'images/'. basename($_FILES['img']['name']);
	} 

	include 'database.php';
 	$conn = OpenCon();
	     
	$sql = "insert into products(s_name,s_price,s_rating,s_img) values('".$name."','".$price."','".$rating."','".$img."') "   ;


	$result = $conn->query( $sql);
	
	echo $conn->error;
	// $row = $result->fetch_assoc( );
	 //print_r( $row );

	CloseCon($conn);

	echo 'ok';

}
?>
<form action="" method="post" enctype="multipart/form-data">
name: <input type="text" name="name" value="" />  <br />
price:<input type="number" name="price" value="" />  <br />
rating:<input type="number" name="rating" value="" />  <br />
<input   type=file   id=meizz   style="display:   none"   onPropertyChange="document.all.ff.value=this.value"> 
 img: <input   name=ff   readonly><input   type=button   value='Browse...'   onclick="document.all.meizz.click()"><br>
  <input type="submit" value="submit" />

</form>