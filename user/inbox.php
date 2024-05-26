<?php require_once "header.php"; 

$log=mysqli_query($con,"select * from msg where u_id=$u_id order by id DESC");
?>
   <div class="inner-box">
                <div class="col-sm-12 page-content">
              

<div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">All Login history</div>

                    <table class="table table-hover">
<thead>
<tr>
<th>Date</th>
<th>Sender Name</th>
<th>Contact Info</th>
<th>Message</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 	for($i=0; $i<mysqli_num_rows($log); $i++){ 
			$row_l=mysqli_fetch_array($log,MYSQLI_ASSOC); ?>
<tr>
<th scope="row"><?php echo $row_l["date"]; ?></th>
<td><?php echo $row_l["name"]; ?></td>
<td><strong>E-mail: </strong><?php echo $row_l["mail"]; ?><br><strong>Mobile: </strong><?php echo $row_l["contact"]; ?></td>
<td><?php echo $row_l["msg"]; ?></td>
<td><a class="btn btn-info btn-xs"  href="p_view?id=<?php echo $row_l["p_id"]; ?>"><i class="fa fa-eye"></i> See product </a>  <a href="del?id=<?php echo $row_l["id"]; ?>&page=inbox&field=msg" class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
                                            </a></td>
</tr>

<?php } ?>
</tbody>
</table>
                    </div>
                


                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
</div>
</div>

	<?php require_once "footer.php"; ?>
