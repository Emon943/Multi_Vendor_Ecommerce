<?php require_once "header.php"; 

$log=mysqli_query($con,"select * from invoice where user=$u_id order by id DESC");
?>
   <div class="inner-box">
                <div class="col-sm-12 page-content">
              

<div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">All Purchase history</div>

                    <table class="table table-hover">
<thead>
<tr>
<th>Date</th>
<th>Invoice Details</th>
<th>Status</th>
<th>Option</th>
</tr>
</thead>
<tbody>
<?php 	for($i=0; $i<mysqli_num_rows($log); $i++){ 
			$row_l=mysqli_fetch_array($log,MYSQLI_ASSOC); ?>
<tr>
<td>Date: <?php echo $row_l["date"]; ?></td>
<td>Invoice#<?php echo $row_l["id"]; ?><br>Total Product: <?php echo $row_l["product"]; ?><br>Total Price: ৳ <?php echo $row_l["price"]; ?></td>
<td><?php if($row_l['status']=="0"){ ?> 											
											<small class="label label-info adlistingtype">Ready to deliver</small>
											<?php } else if($row_l['status']=="1") { ?>
											<small class="label label-success adlistingtype">Delivered</small>
											<?php } else if($row_l['status']=="2") { ?>
											<small class="label label-success adlistingtype">Recieved</small>
											<?php } else  { ?>
											<small class="label label-danger adlistingtype">Rejected</small>
											<?php } ?></td>
<td> <a class="btn btn-danger  btn-sm make-favorite" href="invoice?id=<?php echo $row_l["id"]; ?>"> <i class="fa fa-eye"></i> <span>Go to Invoice</span> </a></td>
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
