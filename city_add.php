<?php
include('../connection.php');
$type=mysql_real_escape_string($_REQUEST['action']);
if($type=='add')
{
	$cname=mysql_real_escape_string($_REQUEST['cname']);
  if(mysql_query("insert into sv_city(city_name)values('$cname')"))
	echo "Inserted";
 else
	echo "Server Error";
}
else if($type=='update')
{
	$cname=mysql_real_escape_string($_REQUEST['cname']);
	$hid=mysql_real_escape_string($_REQUEST['hid']);
	if(mysql_query("update sv_city set city_name='$cname' where city_id='$hid'")) 
		echo "Updated";
	else 
		echo "Error";				

}
else if($type=='delete')
{
	$hid=mysql_real_escape_string($_REQUEST["hid"]);		
	if(mysql_query("delete from sv_city where city_id='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  

?>