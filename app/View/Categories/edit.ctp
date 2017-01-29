<?php $this->start('page-wrapper');  
$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));
$this->Html->css('polka');

$this->end();

?>


<?php 
        $this->start('script');
        echo $this->Html->script('jquery-ui', array('inline' => false));
        echo $this -> Html -> script('ckeditor/ckeditor');
           echo $this -> Html -> script('ckeditor/adapters/jquery');    
           echo $this->fetch('script');
        // echo $this->Html->script('jquery-ui.theme', array('inline' => false));
        $this->end();
?>

<?php

$this->Html->scriptStart(array('inline' => false));
?>
   $(document).ready(function(){

       // Using CKEditor for category-content
       $( '#category-content' ).ckeditor();

   });
<?php 
   $this->Html->scriptEnd(); 
?>


<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Category</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'Categories','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php 
                        echo $this->Form->create('Category',array('controller'=>'Categories','action'=>'edit','role' => 'form','type'=>'file'));
                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$category['Category']['id']));
                       ?>

                      <div class="form-group">
                        <label>Name</label>
                        <?php echo $this->Form->input('name',array('default'=>$category['Category']['name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Order no</label>
                        <?php echo $this->Form->input('order',array('default'=>$category['Category']['order'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Active</label>
                        <?php echo $this->Form->input('active',array('default'=>$category['Category']['active'],'div'=>false,'label'=>false,'class'=>'form-control')); ?>
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