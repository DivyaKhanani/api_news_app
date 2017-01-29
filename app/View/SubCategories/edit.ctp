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

       // Using CKEditor for sub_category-content
       $( '#sub_category-content' ).ckeditor();

   });
<?php 
   $this->Html->scriptEnd(); 
?>


<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">SubCategory</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'sub_categories','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php 
                        echo $this->Form->create('SubCategory',array('controller'=>'sub_categories','action'=>'edit','role' => 'form','type'=>'file'));
                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$sub_category['SubCategory']['id']));
                       ?>

                      <div class="form-group">
                        <label>Name</label>
                        <?php echo $this->Form->input('name',array('default'=>$sub_category['SubCategory']['name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Category</label>
                        <?php echo $this->Form->input('category',array('default'=>$sub_category['SubCategory']['category'],'options' =>$cat_list,'div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Order no</label>
                        <?php echo $this->Form->input('order',array('default'=>$sub_category['SubCategory']['order'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label  for="subcat">Active</label>
                        <?php echo $this->Form->input('app_active',array('default'=>$sub_category['SubCategory']['app_active'],'div'=>false,'label'=>false,'id'=>'subcat')); ?>
                      </div>
                      <div class="form-group">
                        <label  for="subcat">Table name : <?php echo $sub_category['SubCategory']['app_table_name']; ?></label>
                        
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