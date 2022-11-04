<?php
include("dbQuery.php");
$k=new dbQuery;

if($_GET['ID']){
		$id=$_GET['ID'];
		$delete=$k->DeleteOneRecord("asset", "ID", $id);
		if($delete){
			header("location:index.php");
		}
		else{
			echo "<script>alert(Fail to delete);</script>";
		}
}

?>