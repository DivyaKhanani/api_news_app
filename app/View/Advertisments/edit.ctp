<?php $this->start('page-wrapper');  
$this->start('css');
// 

$this->end();

?>
<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Advertisment</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'Advertisments','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php 
                        echo $this->Form->create('Advertisment',array('controller'=>'Advertisments','action'=>'edit','role' => 'form','type'=>'file'));
                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$advertisment['Advertisment']['id']));
                       ?>

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('title',array('default'=>$advertisment['Advertisment']['title'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>URL</label>
                        <?php echo $this->Form->input('url',array('default'=>$advertisment['Advertisment']['url'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      
                      <div class="form-group">
                        <label>Image</label>
                        <?php echo $this->Form->input('image',array('default'=>$advertisment['Advertisment']['image'],'type' => 'file','required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
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
<div class="form-group">
                            <label class="col-sm-2 control-label">Current Primary Photo</label>
                            <div class="col-sm-10">
                                <?php
                                    echo $this->Html->image('/files/advertisment/image/'.$advertisment['Advertisment']['id']."/".$advertisment['Advertisment']['image'],array('style'=>'height:100px;display:block !important'));
                                 ?>
                                <br /><br />
                            </div>
                      </div><?php $this->end('page-wrapper'); ?>