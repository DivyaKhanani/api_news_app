<?php $this->start('page-wrapper');?>

			<div class="row right_margin_zero">
                <div class="col-lg-12">
                    <h3 class="page-header">User Category</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row right_margin_zero">
            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Add New Category</button> -->
            	<?php echo $this->Html->link("Add New Category", array('controller' => 'userCategories','action'=> 'addUserCategory',), array( 'class' => 'btn btn-primary btn-sm left_margin_for_button')); ?>
            </div>
            <br>
          	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" style="border: none;">
                        <!-- <div class="panel-heading">
                            Striped Rows
                        </div> -->
                        <!-- /.panel-heading -->
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Category Name</th>
                                            <th>Updated_By</th>
                                            <th>Date</th>
                                            <!-- <th>Edit</th> -->
                                            <!-- <th>Delete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    	$flag = 1;
                                    	foreach($all_user_categories as $all_user_categories_read)
										{
											echo "<tr>";
											
											echo "<td>".$flag."</td>";
											echo "<td>".$all_user_categories_read['UserCategory']['name']."</td>";
											echo "<td>".$all_user_categories_read['UserCategory']['updated_by']."</td>";
											echo "<td>".$all_user_categories_read['UserCategory']['updated_at']."</td>";
								//			echo "<td>".$this->Html->link('Edit',array('controller'=>'userCategories','action'=>'addUserCategory',$all_user_categories_read['UserCategory']['id']))."</td>";
								//			echo "<td>".$this->Html->link('Delete',array('controller'=>'userCategories','action'=>'deleteUserCategories',$all_user_categories_read['UserCategory']['id']))."</td>";
											
											echo "</tr>";
											$flag++;
										}
                                    
                                    	?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
			<?php 
            
            if(CakeSession::check('Message.delete_user_category'))
			{
				$msg = $this->Session->flash('delete_user_category');
				if($msg = "successfully")
				{ ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Delete Successfully.
            		</div>		
				
		   <?php }
				
				if($msg == "failed")
				{    ?>
					
					<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Failed to Delete
            		</div>
					
		   <?php }
				
			}
			
			if(CakeSession::check('Message.edit_user_category'))
			{
				$msg = $this->Session->flash('edit_user_category');
				if($msg = "successfully")
				{ ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Edit Successfully.
            		</div>		
				
		   <?php }
				
				if($msg == "failed")
				{    ?>
					
					<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Failed to Edit
            		</div>
					
		   <?php }
				
			}
            ?>
<?php $this->end('page-wrapper');?>