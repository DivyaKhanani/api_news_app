<?php $this->start('page-wrapper');  ?>

<?php

$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('bootstrap-datetimepicker.min', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));


$this->end();

?>


<?php 
        $this->start('script');
        echo $this->Html->script('jquery-ui', array('inline' => false));
        echo $this->Html->script('bootstrap-datetimepicker.min', array('inline' => false));
        echo $this->Html->script('locales/bootstrap-datetimepicker.fr', array('inline' => false));

        // echo $this->Html->script('ckeditor/adapters/jquery');
        // echo $this->Html->script('ckeditor/ckeditor');


           // Page-Level Plugin Scripts - Add Items
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

       // Using CKEditor for article-content
       $( '#article-content' ).ckeditor();

   });
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
<?php 
   $this->Html->scriptEnd(); 
?>

<script>
    $(function() {
       $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    });
      $("#sub_cat").click(function () {
      $('#sub_catname').val($('#sub_cat option:selected').text());

    });
        $( ".datepicker-format" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-10:+3",
            dateFormat: 'yy-mm-dd',
            minDate:0
        })
        $('#timepicker1').timepicker({
          use24hours: true,
          
        });

        $('#tem-long_desc').ckeditor();
        
    });
    

</script>


<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Article</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'Article','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php echo $this->Form->create('Article',array('controller'=>'Article','action'=>'add','type' => 'file')); ?>
                      <div class="form-group">
                        <label>Select Table, In which article to be stored</label>
                        <?php echo $this->Form->input('sub_catid',array('div'=>false,'label'=>false,'class'=>'form-control','options'=>$cat_list,'id'=>'sub_cat','required'=>'required')); ?>
                        <?php echo $this->Form->input('sub_catname',array('div'=>false,'label'=>false,'class'=>'form-control','id'=>"sub_catname",'type'=>'hidden')); ?>
                      </div>
                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('title',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Title 2</label>
                        <?php echo $this->Form->input('title2',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                      <label>Select sub Categories</label>
                      <?php echo $this->Form->input('multi_sub_cat',array('div'=>false,'label'=>false,'class'=>'multiple form-control','options'=>$cat_list_title,'id'=>'sub_cat','multiple' => true)); ?>
                      </div>
                      <!-- <div class="form-group">
                <label for="dtp_input1" class="col-md-2 control-label">DateTime Picking</label>
                <div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
        <input type="hidden" id="dtp_input1" value="" /><br/>
            </div> -->
                      
                      <div class="input-group date form_datetime col-md-5" data-date="2016-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                      <input id="schedule_time" name="data[Article][schedule_time]" type="hidden" id="dtp_input1" value="2016-10-09 00:00:00" />
                        <label>Schedule time</label>
                        <input  class="form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><i class=" glyphicon glyphicon-calendar fa fa-times" aria-hidden="true"></i></span>
          

                      </div>
                    <div class="form-group">
                      <label>URL</label>
                      <?php echo $this->Form->input('url',array('div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                    </div>
                    
                     <div class="form-group">
                        <label>Short Description</label>
                        <?php echo $this->Form->input('short_desc',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                      </div>
                    
                    <div class="form-group">
                      <label>Order</label>
                      <?php echo $this->Form->input('priority',array('div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                    </div>
                    <div class="form-group col-lg-6" >
                      <label>Active</label>
                      <?php echo $this->Form->input('app_active',array('div'=>false,'label'=>false)); ?>
                    </div>
                    <div class="form-group col-lg-6" >
                      <?php echo $this->Form->input('app_show_on_top',array('div'=>false,'label'=>'App Show on top')); ?>
                    </div>
                    <div class="form-group col-lg-6" >
                      <?php echo $this->Form->input('app_is_featured',array('div'=>false,'label'=>'App Show on home page')); ?>
                    </div>
                    <div class="form-group col-lg-6" >
                      <?php echo $this->Form->input('app_is_cat_featured',array('div'=>false,'label'=>'App Show on Category Page')); ?>
                    </div>
                      <div class="form-group col-lg-12">
                      <label class="control-label">Content</label>
                           <?php echo $this -> Form -> input('content', array('type'=>'textarea','div' => false,'required' =>'required', 'label' => false, 'title' => 'Content Description', 'class' => 'form-control', 'id' => 'article-content','style'=>'margin: 0px -0.5px 0px 0px;')); ?>
                      </div>

                      
                      
                      <!-- <div class="form-group">                          
                            <label>Select File</label>
                            <?php echo $this->Form->input('image_name', array('class'=>'form-control','title'=>'Image','label' => false, 'type' => 'file'));?>
                        </div>  

                        <div class="form-group">
                        <label>Image Caption</label>
                        <?php echo $this->Form->input('caption',array('div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                        </div>    -->               
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Primary Photo (PNG, JPG or GIF) (Size = 500 x 500 )</label>
                            <div class="col-sm-10">
                                <?php echo $this -> Form -> input('image', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Primary Photo', 'id' => 'item-primary-photo'));

                                 ?>
                            </div>
                        </div>                     

                      <div class="form-group col-lg-12">
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