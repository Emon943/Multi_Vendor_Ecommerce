<?php require_once "header.php"; 

if(isset($_POST['cl'])){
	


		mysqli_query($con,"delete from fav_ad where u_id=$u_id");
		

}


?>
 <div class="inner-box">
                <div class="col-sm-12 page-content">
                   
                        <h2 class="title-2"><i class="fa fa-heart"></i> Favourite Products </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    <form action="" method="post">
									
                                    <input type="submit" class="btn btn-large btn-danger" value="Clear List" name="cl">
									</form>	
								</label>
								
								
								
								

								

                                <div class="table-search pull-right col-xs-7">
                                    <div class="form-group">
                                        <label class="col-xs-5 control-label text-right">Search <br>
                                            <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                        </label>

                                        <div class="col-xs-7 searchpan">
                                            <input type="text" class="form-control" id="filter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
								
								
								<?php $qr=mysqli_query($con,"select * from fav_ad where u_id=$u_id"); 
								for($i=0; $i<mysqli_num_rows($qr); $i++){ 
									$row3=mysqli_fetch_array($qr,MYSQLI_ASSOC);
									
									$p_id=$row3["p_id"];
									
									$pro=mysqli_query($con,"select * from product where id=$p_id");
									$row_p=mysqli_fetch_array($pro,MYSQLI_ASSOC);
									?>
								
                                <tr>
                                    
                                    <td style="width:14%" class="add-img-td"><a href="ads-details.html"><img
                                            class="thumbnail  img-responsive"
                                            src="../uploads/<?php echo $row_p["img1"]; ?>"
                                            alt="No Image"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="p_view?id=<?php echo $row_p["id"]; ?>" ><?php echo $row_p["title"]; ?></a> </strong> </p>

                                            <p><strong> Posted On </strong>:
                                                <?php echo $row_p["date"]; ?> <strong>Brand:</strong> <?php echo $row_p["brand"]; ?> </p>

                                            <p><strong>Category:</strong> <?php 
								$s_cat=$row_p["s_cat"]; 
								$cat_r=mysqli_query($con,"select cat,name from sub_cat where id=$s_cat");
								$row_c=mysqli_fetch_array($cat_r,MYSQLI_ASSOC);  
								echo $row_c["name"]; 
								$c_id=$row_c["cat"]; 
								$cat_c=mysqli_query($con,"select name from category where id=$c_id");
								$row_ct=mysqli_fetch_array($cat_c,MYSQLI_ASSOC); 
								echo "(".$row_ct["name"].")";
								?>  
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> ৳ <?php echo $row_p["price"]; ?></strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                           

											
											<p><a href="p_view?id=<?php echo $row_p["id"]; ?>" class="btn btn-success btn-xs"> <i class="fa fa-search-plus"></i> View </a>
                                            </p>

											
                                            <p><a href="del?id=<?php echo $row3["id"]; ?>&page=fav_product&field=fav_ad" class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
                                        </div>
                                    </td>
                                </tr>
                              
								<?php } ?> 
                               
                               
                                </tbody>
                            </table>
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    </div>
    <!-- /.main-container -->

	<?php require_once "footer.php"; ?>
