<?php
include('../connection.php');
$type=mysql_real_escape_string($_REQUEST['typ']);

if($type=='add')
{
	$sname=mysql_real_escape_string($_POST['sname']);
	//$service_img=$_POST['service_img'];	
	$file_name = $_FILES['service_img']['name'];
	$random_digit=rand(0000,9999);
	if($file_name!="")
	{		
		$file_name= $random_digit.$file_name;
 		$path= "admin-logo/" .$file_name;
		move_uploaded_file($_FILES['service_img']["tmp_name"],$path);
	}
	else 
		$file_name="";

  if(mysql_query("insert into sv_services(services_name,service_img)values('$sname','$file_name')"))
	echo "Inserted";
		header("Location:services.php?msg="."Inserted");

}
else if($type=='update')
{
	$sname=mysql_real_escape_string($_POST['sname']);
	$id=mysql_real_escape_string($_POST['hid']);
	$res=mysql_query("select * from sv_services where services_id='$id'");	
	$row=mysql_fetch_array($res);
	$old_file="admin-logo/".$row['service_img'];
	$file_name = $_FILES['service_img']['name'];
	$random_digit=rand(0000,9999);
		if($file_name!="")
		{		
			$file_name= $random_digit.$file_name;
 			$path= "admin-logo/" .$file_name;
			
			move_uploaded_file($_FILES['service_img']["tmp_name"],$path);
			if (file_exists($old_file))
			{
				unlink($old_file);
			}
		}
	 	else 
		{
			$old_file=mysql_real_escape_string($row['service_img']);
			$file_name=mysql_real_escape_string($old_file);
			//$file_name=$old_file;
		} 
	mysql_query("update sv_services set services_name='$sname',service_img='$file_name' where services_id='$id'");
	echo "Updated";
			header("Location:services.php?msg="."Updated");

}
else if($type=='delete')
{
	$hid=mysql_real_escape_string($_REQUEST["hid"]);
	if(mysql_query("delete from sv_services where services_id='$hid'"))
		echo "Deleted";
	else 
		echo "Error";
}

?>