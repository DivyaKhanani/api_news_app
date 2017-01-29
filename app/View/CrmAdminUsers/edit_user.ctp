<?php $this->start('page-wrapper');  ?>

<div class="row right_margin_zero">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit User</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
<?php echo $this->Form->create('User',array('controller'=>'users',array('action'=>'editUser',$user_id))); ?>
            
<?php echo $this->Form->input('id',array('div'=>false,'label'=>false,'type'=>'hidden','value'=>$user_detail['User']['id'])); ?>

           <div class="row right_margin_zero">
            <div class="col-lg-4">
            	<div class="form-group" style="padding-left: 0px;">
            	<label>User Type : </label>
            	<?php
            	
            	echo $this->Form->input('user_category_id', array('required' =>'required','options' => $all_user_category, 'selected' => $user_detail['UserCategory']['id'], 'class' => 'form-control', 'data-required' => 'true', 'label' => false, 'div' => false));
            	// echo $this -> Form -> input('user_category_id', array('options' => $all_user_category, 'class' => 'form-control m-b parsley-validated', 'data-required' => 'true', 'label' => false, 'div' => false,'name'=>'data[User][user_category_id]'));
            	?>
            </div>
            </div>
            </div>
            
            <div class="row right_margin_zero">
            	<div class="form-group left_padding_zero">
            		<div class="col-lg-4">
                   <label>User Name : </label>
                   <br>
                   <?php echo $this->Form->input('username',array('required' =>'required','default'=>$user_detail['User']['username'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'username')); ?>
                   </div>
                   <div class="col-lg-4">
                   <label>Password : </label>
                   <br>
                   <?php echo $this->Form->input('password',array('required' =>'required','type'=>'password','default'=>$user_detail['User']['password'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'password')); ?>
                   </div>
                </div>
            </div>
            
            <div class="row right_margin_zero">
            	<div class="form-group left_padding_zero">
            		<div class="col-lg-4">
                   <label>First Name : </label>
                   <br>
                   <!-- <input class="form-control bottom_margin_for_text_field" placeholder="First Name"> -->
                   <?php echo $this->Form->input('first_name',array('required' =>'required','default'=>$user_detail['User']['first_name'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'First Name')); ?>
                   </div>
                   <div class="col-lg-4">
                   <label>Middle Name : </label>
                   <br>
                   <!-- <input class="form-control bottom_margin_for_text_field" placeholder="Middle Name"> -->
                   <?php echo $this->Form->input('middle_name',array('required' =>'required','default'=>$user_detail['User']['middle_name'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'Middle Name')); ?>
                   </div>
                   <div class="col-lg-4">
                   <label>Last Name : </label>
                   <br>
                   <?php echo $this->Form->input('last_name',array('required' =>'required','default'=>$user_detail['User']['last_name'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'Last Name')); ?>
                   <!-- <input class="form-control bottom_margin_for_text_field" placeholder="Last Name"> -->
                   </div>
                </div>
            </div>
           
            <div class="row right_margin_zero">
            	<div class="form-group left_padding_zero">
            		<div class="col-lg-4">
                   <label>D.O.B : </label>
                   <br>
                   <!-- <input type="text" id="datepicker" class="form-control bottom_margin_for_text_field" placeholder="select date"> -->
                   <?php echo $this->Form->input('date_of_birth',array('default'=>$user_detail['User']['date_of_birth'],'div'=>false,'label'=>false,'type'=>'text','id'=>'datepicker','class'=>'form-control bottom_margin_for_text_field date-pick dp-applied dp-choose-date','placeholder'=>'select date')); ?>
                   </div>
            		<div class="col-lg-4">
                   <label>Mobile : </label>
                   <br>
                   <!-- <input class="form-control bottom_margin_for_text_field" placeholder="Mobile"> -->
                   <?php echo $this->Form->input('mobile',array('required' =>'required','default'=>$user_detail['User']['mobile'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'Mobile')); ?>
                   </div>
                   <div class="col-lg-4">
                   <label>E-Mail : </label>
                   <br>
                   <!-- <input class="form-control bottom_margin_for_text_field" placeholder="E-Mail Address"> -->
                   <?php echo $this->Form->input('email',array('default'=>$user_detail['User']['email'],'div'=>false,'label'=>false,'class'=>'form-control bottom_margin_for_text_field','placeholder'=>'E-Mail Address')); ?>
                   </div>
                   <!-- <div class="col-lg-1">
                   	
                   	<button type="button" class="btn btn-info" style="margin-top: 24px;">
                   		Date
                   	</button>
                   </div> -->
                </div>
            </div>
           
           
            <div class="rowright_margin_zero">
            	<div class="form-group left_padding_zero">
                    <label>Address : </label>
                    <!-- <textarea class="form-control" rows="2"></textarea> -->
                    <?php echo $this->Form->input('address',array('required' =>'required','default'=>$user_detail['User']['address'],'div'=>false,'label'=>false,'type'=>'textarea','class'=>'form-control','rows'=>'2')); ?>
                </div>
            </div>
            <div class="row right_margin_zero">
            <div class="col-lg-4">
            	<div class="form-group left_padding_zero">
        		
            	<?php echo $this -> Form -> input('city', array('required' =>'required','options' => $city_list, 'selected' => $user_detail['User']['city'], 'class' => 'form-control', 'data-required' => 'true', 'label' => false, 'div' => false)); ?>
           
               </div>
            </div>
            
            <div class="col-lg-4">
            	<div class="form-group left_padding_zero">
                <?php echo $this -> Form -> input('state', array('required' =>'required','options' => $state_list, 'selected' => $user_detail['User']['state'], 'class' => 'form-control', 'data-required' => 'true', 'label' => false, 'div' => false)); ?>
            </div>
            </div>
            
            <div class="col-lg-4">
            	<div class="form-group left_padding_zero">
                <?php echo $this -> Form -> input('country', array('required' =>'required','options' => $country_list, 'selected' => $user_detail['User']['country'], 'class' => 'form-control', 'data-required' => 'true', 'label' => false, 'div' => false)); ?>
            </div>
            </div>
            
            </div>
            <div class="row">
            	
            	<div class="form-group">
            		<div class="col-lg-12 left_padding_zero">
                   <label>Remark : </label>
                   <br>
                   <!-- <input class="form-control"> -->
                   <?php echo $this->Form->input('remark',array('default'=>$user_detail['User']['remark'],'div'=>false,'label'=>false,'class'=>'form-control')); ?>
                   </div>
                </div>
            </div>
            <br />
            <div class="row right_margin_zero">
            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Reset</button> -->
            	<?php echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-primary btn-sm left_margin_for_button')); ?>
            	<!-- <button type="button" class="btn btn-primary btn-sm" style="margin-left: 15px;">Add</button> -->
            </div>
            
            <?php echo $this->Form->end(); ?>
            
            <div class="row right_margin_zero">
            	<!-- <a href="#" class="btn btn-link" style="padding: 10px 16px;">Back to List</a> -->
            	<?php echo $this->Html->link('Back to List',array('controller'=>'users','action'=>'index'),array('class'=>'btn btn-link top_bottom_left_right_padding')); ?>
            </div>
            
<?php $this->end('page-wrapper'); ?>