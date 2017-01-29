<?php $this->start('page-wrapper');  ?>

<?php

$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));
$this->end();

?>


<?php 
        
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
          <h1 class="page-header">Advertisment</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'Advertisments','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php echo $this->Form->create('Advertisment',array('controller'=>'Advertisments','action'=>'add','type' => 'file')); ?>

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('title',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Image</label>
                        <?php echo $this->Form->input('image',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>URL</label>
                        <?php echo $this->Form->input('url',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Active</label>
                        <?php echo $this->Form->input('active',array('required' =>'required','div'=>false,'label'=>false)); ?>
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