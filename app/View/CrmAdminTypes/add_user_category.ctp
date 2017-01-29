<?php $this->start('page-wrapper'); ?>
			
			<?php 
			
			if($user_category_name_edit != null)
			{
			?>
			
			<div class="row right_margin_zero">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit User Category</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <?php echo $this->Form->create('UserCategory',array('controller'=>'UserCategories','action'=>'editUserCategories')); ?>
            
            <?php echo $this->Form->input('id',array('div'=>false,'label'=>false,'type'=>'hidden','value'=>$user_category_name_edit['UserCategory']['id']))?>
            
            <div class="row right_margin_zero">
            	<div class="form-group">
                   <label>Name : </label>
                   <br>
                   <!-- <input class="form-control" placeholder="Enter Category Name"> -->
                   <?php echo $this->Form->input('name',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','value'=>$user_category_name_edit['UserCategory']['name']));?>
                </div>
            </div>
            <div class="row right_margin_zero">
            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Add</button> -->
            	<?php echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-primary btn-sm left_margin_for_button')); ?>
            </div>
            
            <?php echo $this->Form->end(); ?>
            
            <div class="row right_margin_zero">
            	<!-- <a href="#" class="btn btn-link">Back to List</a> -->
            	<?php echo $this->Html->link('Back to List',array('controller'=>'userCategories','action'=>'index'),array('class'=>'btn btn-link top_bottom_left_right_padding')); ?>
            </div>
             
			
			<?php	
			}
			else 
			{
			?>
			
			<div class="row right_margin_zero">
                <div class="col-lg-12">
                    <h3 class="page-header">Add New User Category</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <?php echo $this->Form->create('UserCategory',array('controller'=>'UserCategories','action'=>'addUserCategory')); ?>
            
            <div class="row right_margin_zero">
            	<div class="form-group">
                   <label>Name : </label>
                   <br>
                   <!-- <input class="form-control" placeholder="Enter Category Name"> -->
                   <?php echo $this->Form->input('name',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','placeholder'=>'Enter Category Name'));?>
                </div>
            </div>
            <div class="row right_margin_zero">
            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Add</button> -->
            	<?php echo $this->Form->input('Add',array('type'=>'submit','label'=>false,'class'=>'btn btn-primary btn-sm left_margin_for_button')); ?>
            </div>
            
            <?php echo $this->Form->end(); ?>
            
            <div class="row right_margin_zero">
            	<!-- <a href="#" class="btn btn-link">Back to List</a> -->
            	<?php echo $this->Html->link('Back to List',array('controller'=>'userCategories','action'=>'index'),array('class'=>'btn btn-link top_bottom_left_right_padding')); ?>
            </div>
            
            <?php 
            
            if(CakeSession::check('Message.add_user_category'))
			{
				$msg = $this->Session->flash('add_user_category');
				if($msg = "successfully")
				{ ?>
					
					<div class="alert alert-success alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Successfully Added.
            		</div>		
				
		   <?php }
				
				if($msg == "failed")
				{    ?>
					
					<div class="alert alert-danger alert-dismissable">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                		Failed to Add
            		</div>
					
		   <?php }
				
			}
            ?>
			
			
			<?php	
			}
			?>
			
<?php $this->end('page-wrapper');?>