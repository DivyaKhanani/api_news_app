<?php $this->start('page-wrapper');  ?>

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">User</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">

      <div class="panel panel-default">
          <div class="panel-heading">
              Change Password
          </div>

          <div class="panel-body">
              <div class="row">
                  <div class="col-lg-12">

                    <?php echo $this->Form->create('CrmAdminUser',array('controller'=>'crm_admin_users',array('action'=>'change_password',$activeUser['User']['id']))); ?>

                    <div class="form-group">
                      <label>Current Password</label>
                      <?php echo $this->Form->input('old_password',array('type'=>'password','required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','id'=>'old_password')); ?>
                    </div>

                    <div class="form-group">
                      <label>New Password</label>
                      <?php echo $this->Form->input('new_password',array('type'=>'password','required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','id'=>'new_password')); ?>
                    </div>

                    <div class="form-group">
                      <label>Verify Password</label>
                      <?php echo $this->Form->input('verify_password',array('type'=>'password','required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','id'=>'verify_password')); ?>
                    </div>

                    <div class="form-group">
                      <?php echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-primary btn-sm left_margin_for_button')); ?>
                    </div>

                    <?php echo $this->Form->end(); ?>                  

                </div>          
              </div>
            </div>

        </div>
      </div>
    </div>
            
<?php $this->end('page-wrapper'); ?>