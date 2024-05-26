<?php require_once "header.php"; 

$log=mysqli_query($con,"select * from log where user=$u_id order by id DESC");
?>
   <div class="inner-box">
                <div class="col-sm-12 page-content">
              

<div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">All Login history</div>

                    <table class="table table-hover">
<thead>
<tr>
<th>Log_id</th>
<th>Date & Time</th>
<th>IP</th>
</tr>
</thead>
<tbody>
<?php 	for($i=0; $i<mysqli_num_rows($log); $i++){ 
			$row_l=mysqli_fetch_array($log,MYSQLI_ASSOC); ?>
<tr>
<th scope="row"><?php echo $row_l["id"]; ?></th>
<td><?php echo $row_l["date"]; ?></td>
<td><?php echo $row_l["ip"]; ?></td>
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
