<?php $this->start('page-wrapper');  ?>

<?php

$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));
$this->end();

?>


<?php 
        $this->start('script');
        echo $this->Html->script('jquery-ui', array('inline' => false));
        
           // Page-Level Plugin Scripts - Add Items
           echo $this -> Html -> script('ckeditor/ckeditor');
           echo $this -> Html -> script('ckeditor/adapters/jquery');    
           echo $this->fetch('script');
        
        $this->end();
?>

<?php

$this->Html->scriptStart(array('inline' => false));
?>
   $(document).ready(function(){

       // Using CKEditor for article-content
       $( '#article-content' ).ckeditor();

   });
<?php 
   $this->Html->scriptEnd(); 
?>

<script>
    $(function() {
      

        $('#tem-long_desc').ckeditor();
    });

</script>


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
                Add

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

                      <?php echo $this->Form->create('Category',array('controller'=>'Categories','action'=>'add','type' => 'file')); ?>

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('name',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Order</label>
                        <?php echo $this->Form->input('order',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Active</label>
                        <?php echo $this->Form->input('active',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
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
            
<?php $this->end('page-wrapper'); ?>