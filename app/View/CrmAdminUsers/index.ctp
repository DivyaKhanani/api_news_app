<?php $this->start('page-wrapper');  ?>
            <div class="row right_margin_zero">
                <div class="col-lg-12">
                    <h3 class="page-header">Users</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row right_margin_zero">
 			<?php echo $this->Html->link("Add New User", array('controller' => 'users','action'=> 'addUser',), array( 'class' => 'btn btn-primary btn-sm left_margin_for_button')); ?>
 
 <!-- echo $this->Form->button('Add New User', array('type'=>'button','class'=>'btn btn-primary btn-sm')); -->

            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Add New User</button> -->
            </div>
            <br>
            <div class="row right_margin_zero">
            <div class="col-lg-4">
            	<div class="form-group" style="padding-left: 0px;">
                <?php echo $this -> Form -> input('user_category_id', array('id' => 'user_category_wise','options' => $all_user_category,'class' => 'form-control', 'data-required' => 'true', 'label' => false, 'div' => false)); ?>
            </div>
            </div>
            </div>
            
            
          	<div class="row" id="user_feed">
                
<!--             -------- User Detail Goes Here From Ajax Call ----------------------     -->
            </div>
        
        <?php 
            
            if(CakeSession::check('Message.edit_user'))
			{
				$msg = $this->Session->flash('edit_user');
				if($msg = "successfully")
				{ ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Edited Successfully.
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
            
        <?php 
            
            if(CakeSession::check('Message.add_user'))
			{
				$msg = $this->Session->flash('add_user');
				if($msg = "successfully")
				{ ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Added Successfully.
            		</div>		
				
		   <?php }
				
				if($msg == "failed")
				{    ?>
					
					<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Failed to Add.
            		</div>
					
		   <?php }
				
			}
            ?>    
            
        <?php 
            
            if(CakeSession::check('Message.delete_user'))
			{
				$msg = $this->Session->flash('delete_user');
			//	die($msg);
				if($msg == "enabled")
				{  ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Enabled User Access Successfully.
            		</div>		
				
		   <?php }
				
				if($msg == "disabled")
				{  ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Disabled User Access Successfully.
            		</div>		
				
		   <?php }
				
				if($msg == "failed")
				{    ?>
					
					<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Failed to Delete.
            		</div>
					
		   <?php }
				
			}
            ?>
        
<?php $this->end('page-wrapper'); ?>