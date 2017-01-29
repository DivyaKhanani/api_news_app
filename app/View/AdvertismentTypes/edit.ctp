<?php $this->start('page-wrapper');  
$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));
$this->Html->css('polka');

$this->end();

?>


<?php

$this->Html->scriptStart(array('inline' => false));
?>
   $(document).ready(function(){

       // Using CKEditor for advertismentType-content

   });
<?php 
   $this->Html->scriptEnd(); 
?>


<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">AdvertismentType</h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              
            <div class="panel-heading">
                Edit

                <div class="pull-right">
                  <?php
                    echo $this->Html->link('Back',array('controller'=>'AdvertismentTypes','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php 
                        echo $this->Form->create('AdvertismentType',array('controller'=>'AdvertismentTypes','action'=>'edit','role' => 'form','type'=>'file'));
                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$advertismentType['AdvertismentType']['id']));
                       ?>

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('title',array('default'=>$advertismentType['AdvertismentType']['title'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>URL</label>
                        <?php echo $this->Form->input('url',array('default'=>$advertismentType['AdvertismentType']['url'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="">
                        <label>Active</label>
                        <?php echo $this->Form->input('active',array('default'=>$advertismentType['AdvertismentType']['active'],'div'=>false,'label'=>false)); ?>
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
            
<?php $this->end('page-wrapper'); ?>