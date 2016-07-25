<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("../connection.php"); ?>
<?php 
if(isset($_REQUEST['id']))
	{		
		$id=$_REQUEST['id'];
		$res=mysql_query("select * from sv_pages where id='$id'");
		$row=mysql_num_rows($res);
				
			$fet=mysql_fetch_array($res);	
			$id=$fet['id'];
			$page_name=$fet['page_name'];	
			$page_content=$fet['page_content'];					
			$typ="update";		
	}
	
	$page = 'pages';

?>

			  <script src="js/tinymce/tinymce.min.js"></script> 
		<script>
		
    tinymce.init({
        selector: "textarea#page_content",
        theme: "modern",
        width: 970,
        height: 300,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
    }); 
		
</script> 

</head>
<body>
    <div id="wrapper">
        <?php include("top_menu.php") ?>
        <!--/. NAV TOP  -->
        <?php include("side_menu.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Pages
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Pages</a></li>
					</ol>		
		</div>
		<input type="hidden" id="hid" name="hid" value="<?php echo $postal_id;?>">
            <div id="page-inner">
			    <div class="panel-body">
				<div class="text-center">
				<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Updated")
		{
		      echo '<div class="succ-msg">Updated Successfully.</div>';
		}
		
}

else
	$msg="";
?>
				
<!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>	</div>-->
		<form class="" name="admin_s" id="admin_s" method="post" enctype="multipart/form-data" action="pages_addcode.php">
<input type="hidden" id="typ" name="typ" value="<?php echo $typ;?>">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
										<div class="col-lg-3 col-md-3 col-sm-3"></div>

				<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
				</div>
				<div class="text-center">
					<?php if(isset($_REQUEST['id'])) { ?>
					<div class="form-group">
                    <label>Page Name</label>				
					<input type="text" class="form-control" required="required" id="pname" name="pname" value="<?php echo $page_name;?>"></div>
					<textarea id="page_content" name="page_content"><?php echo $page_content;?></textarea>

					<button type="submit" class="btn btn-primary" onclick="javascript:pages_funct('update')">Update</button>

					<?php } else { ?>
					<!--<button type="submit" class="btn btn-primary" onclick="javascript:pages_funct('add')">Add</button>-->
					<?php } ?>
				</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
		</form>
					</div>
			
	
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Pages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th>Page Name</th>
											<th>Update</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										$res=mysql_query("select * from sv_pages");
										while($row=mysql_fetch_array($res))
										{
											$sno++;
											$id=$row['id'];				
											$page_name=$row['page_name'];				
									?>  									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $page_name; ?></td>
											<td><a href="pages.php?id=<?php echo $id;?>"><img src="images/file_edit.png"  alt="update" title="update" ></a></td>
											
										</tr>
										<?php } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                   </div>
				   				<?php include("footer.php") ?>

    </div>
             <!-- /. PAGE INNER  -->
            
</body>

</html>
