<?php $this->start('page-wrapper');  ?>
		
		<div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">

                        <div class="panel-heading">
                        	<center><?php echo $this->Html->image('actonate.png', array('alt' => 'GS','style'=>'width:100%;')); ?></center>
    						<center><h3>CMS</h3></center>
                        </div>
                        
                        <div class="panel-body">
                        <?php echo $this->Form->create('CrmAdminUser',array('controller' => 'crm_admin_users','action' => 'login')); ?>
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                    	<?php echo $this->Form->input('username',array('required'=>'required','label'=>false,'div'=>false,'class'=>'form-control','placeholder'=>'Username','autofocus'=>'autofocus'))?>
                                    </div>
                                    <div class="form-group">
                                    	<?php echo $this->Form->input('password',array('required'=>'required','label'=>false,'div'=>false,'class'=>'form-control','placeholder'=>'Password','type' =>'password'))?>
                                    </div>
                                    <?php echo $this->Form->input('Login',array('type'=>'submit','label'=>false,'div'=>false,'class'=>'btn btn-lg btn-success btn-block')); ?>
                                </fieldset>
                            </form>
                         <?php echo $this->Form->end(); ?>
                        </div>
                        
                        <?php 
            			echo $this->Session->flash('auth');
    					echo $this->Session->flash('bad'); 
    					echo $this->Session->flash('good'); 
            			?>
            			
                    </div>
                </div>
            </div>
        </div>
		
<?php $this->end('page-wrapper');  ?>