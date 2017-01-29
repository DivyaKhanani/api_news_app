<?php $this->start('page-wrapper'); 

if($configurations_count == 0 ) {
  ?>

  <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Configuration</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                
              <div class="panel-heading">
                  Add                
              </div>
    
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">

                        <?php echo $this->Form->create('Configuration',array('type' => 'file','controller'=>'configurations','action'=>'add', 'role' => 'form')); ?>

                        <div class="form-group">
                          <label>Name</label>
                          <?php echo $this->Form->input('name',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                        </div>

                        <div class="form-group">
                          <label>Domain Name</label>
                          <?php echo $this->Form->input('domain_name',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                        </div>

                        <div class="form-group">
                          <label>Footer Left</label>
                          <?php echo $this->Form->input('footer_left',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>
                        </div>

                        <div class="form-group">
                          <label>Footer Right</label>
                          <?php echo $this->Form->input('footer_right',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>
                        </div>

                        <div class="form-group">                                                  
                          <label>Logo</label>
                          <?php echo $this -> Form -> input('logo_name', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Logo')); ?>
                        </div> 

                        <div class="form-group">                                                  
                          <label>Favicon</label>
                          <?php echo $this -> Form -> input('favicon_name', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Favicon')); ?>
                        </div>                                        

                        <div class="form-group">
                          <?php echo $this->Form->input('Add',array('type'=>'submit','label'=>false,'class'=>'btn btn-success btn-sm left_margin_for_button')); ?>
                        </div>

                        <?php echo $this->Form->end(); ?>                  

                    </div>          
                  </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    </div>
    <!-- /.row -->
            
  <?php
  } else {
  ?>

<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Configuration</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              
            <div class="panel-heading">
                Edit                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">       

                      <?php 
                        echo $this->Form->create('Configuration',array('type' => 'file','controller'=>'configurations','action'=>'edit', 'role' => 'form'));

                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$configuration['Configuration']['id']));
                       ?>

                      <div class="form-group">
                        <label>Name</label>
                        <?php echo $this->Form->input('name',array('default'=>$configuration['Configuration']['name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="form-group">
                        <label>Domain Name</label>
                        <?php echo $this->Form->input('domain_name',array('default'=>$configuration['Configuration']['domain_name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="form-group">
                        <label>Footer Left</label>
                        <?php echo $this->Form->input('footer_left',array('default'=>$configuration['Configuration']['footer_left'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="form-group">
                        <label>Footer Right</label>
                        <?php echo $this->Form->input('footer_right',array('default'=>$configuration['Configuration']['footer_right'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="form-group">                                                  
                        <label>Logo <br /><br />  (actonation/files/configuration/logo_name/<?php echo $configuration['Configuration']['logo_dir']."/".$configuration['Configuration']['logo_name']; ?>)</label><br />
                        <?php
                        echo $this->Html->image('../files/configuration/logo_name/'.$configuration['Configuration']['logo_dir']."/".$configuration['Configuration']['logo_name']);

                        echo "<br /><br />";

                        echo $this -> Form -> input('logo_name', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Logo')); ?>
                      </div>

                      <div class="form-group">                                                  
                        <label>Favicon <br /><br />  (actonation/files/configuration/favicon_name/<?php echo $configuration['Configuration']['favicon_dir']."/".$configuration['Configuration']['favicon_name']; ?>)</label><br />
                        <?php
                        echo $this->Html->image('../files/configuration/favicon_name/'.$configuration['Configuration']['favicon_dir']."/".$configuration['Configuration']['favicon_name']);

                        echo "<br /><br />";

                        echo $this -> Form -> input('favicon_name', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Favicon')); ?>
                      </div>                                                                                  

                      <div class="form-group">
                        <?php echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-warning btn-sm left_margin_for_button')); ?>
                      </div>

                      <?php echo $this->Form->end(); ?>                  

                  </div>          
                </div>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  
  </div>
  <!-- /.row -->  
  
  <?php  
  }

$this->end('page-wrapper'); ?>