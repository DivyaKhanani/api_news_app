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
          <h1 class="page-header">AdvertismentTimming</h1>
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
                    echo $this->Html->link('Back',array('controller'=>'AdvertismentTimmings','action'=>'index'),array('class'=>'btn btn-xs btn-primary'));
                  ?>                  
                </div>                
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">

                      <?php echo $this->Form->create('AdvertismentTimming',array('controller'=>'AdvertismentTimmings','action'=>'add','type' => 'file')); ?>

                      <div class="form-group">
                        <label>Select Advertisment</label>
                        <?php echo $this->Form->input('advertisment_id',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','options'=>$adv)); ?>
                      </div>
                      <div class="form-group">
                        <label>Select Advertisment Type</label>
                        <?php echo $this->Form->input('advertisment_type_id',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','options'=>$adv_type)); ?>
                      </div>
                      
                
                      <div class="form-group input-group date form_datetime col-md-5" data-date="2016-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                        <input id="" name="data[Article][start_time]" type="hidden" id="dtp_input1" value="2016-10-09 00:00:00" />
                          <label>Start time</label>
                          <input  class="form-control" size="16" type="text" value="" readonly>
                          <span class="input-group-addon"><i class=" glyphicon glyphicon-calendar fa fa-times" aria-hidden="true"></i></span>
                      </div>
                      <div class="form-group input-group date form_datetime col-md-5" data-date="2016-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                        <input id="" name="data[Article][end_time]" type="hidden" id="dtp_input1" value="2016-10-09 00:00:00" />
                          <label>End time</label>
                          <input  class="form-control" size="16" type="text" value="" readonly>
                          <span class="input-group-addon"><i class=" glyphicon glyphicon-calendar fa fa-times" aria-hidden="true"></i></span>
                      </div>
                      <div class="form-group">
                      <br>
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