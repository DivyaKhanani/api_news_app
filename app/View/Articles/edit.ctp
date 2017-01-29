<?php $this->start('page-wrapper');  
$this->start('css');
// 
$this->Html->css('jquery-ui', null, array('inline' => false));
$this->Html->css('bootstrap-datetimepicker.min', null, array('inline' => false));
$this->Html->css('jquery-ui.theme', array('inline' => false));
$this->Html->css('polka');

$this->end();

?>


<?php 
        $this->start('script');
        echo $this->Html->script('jquery-ui', array('inline' => false));
        echo $this->Html->script('bootstrap-datetimepicker.min', array('inline' => false));
        echo $this->Html->script('locales/bootstrap-datetimepicker.fr', array('inline' => false));
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
                Edit

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

                      <?php 
                        echo $this->Form->create('Article',array('url'=>array('controller'=>'articles','action'=>'edit',$table,$article['Article']['id']),'role' => 'form','type'=>'file'));
                        echo $this->Form->input('id',array('type'=>'hidden','default'=>$article['Article']['id']));
                       ?>

                      <div class="form-group">
                        <label>Title</label>
                        <?php echo $this->Form->input('title',array('default'=>$article['Article']['title'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Title2</label>
                        <?php echo $this->Form->input('title2',array('default'=>$article['Article']['title2'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="input-group date form_datetime col-md-5" data-date="2016-09-16T05:25:07Z" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="dtp_input1">
                      <input id="schedule_time" name="data[Article][schedule_time]" type="hidden" id="dtp_input1" value="<?php echo $article['Article']['schedule_time']; ?>" />
                          <label>Schedule time</label>
                          <input  class="form-control" size="16" type="text" readonly value="<?php echo $article['Article']['schedule_time']; ?>">
                      <span class="input-group-addon"><i class=" glyphicon glyphicon-calendar fa fa-times" aria-hidden="true"></i></span>
          

                      </div>
                      <div class="form-group">
                        <label>url</label>
                        <?php echo $this->Form->input('url',array('default'=>$article['Article']['url'],'div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>
                      <div class="form-group">
                        <label>Order</label>
                        <?php echo $this->Form->input('priority',array('default'=>$article['Article']['priority'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                      </div>

                      <div class="form-group col-lg-6">
                      <label for="active">Active</label>
                        <?php echo $this->Form->input('app_active',array('default'=>$article['Article']['app_active'],'div'=>false,'label'=>false,'id'=>'active'));
                        ?>
                      </div>
                      <div class="form-group col-lg-6">
                      <label for="app_show_on_top">App Show on top</label>
                        <?php echo $this->Form->input('app_show_on_top',array('default'=>$article['Article']['app_show_on_top'],'div'=>false,'label'=>false,'id'=>'app_show_on_top'));
                        ?>
                      </div>
                      <div class="form-group col-lg-6">
                      <label for="app_is_featured">App Show on home page</label>
                        <?php echo $this->Form->input('app_is_featured',array('default'=>$article['Article']['app_is_featured'],'div'=>false,'label'=>false,'id'=>'app_is_featured'));
                        ?>
                      </div>
                      <div class="form-group col-lg-6">
                      <label for="app_is_cat_featured">App Show on Category Page</label>
                        <?php echo $this->Form->input('app_is_cat_featured',array('default'=>$article['Article']['app_is_cat_featured'],'div'=>false,'label'=>false,'id'=>'app_is_cat_featured'));
                        ?>
                      </div>
                      <!-- <div class="form-group">
                      <label>Schedule time</label>
                          <?php 
                          //echo $this->Form->input('schedule_time',array('default'=>$article['Article']['schedule_time'],'required' =>'required','label'=>false,'class'=>'datepicker'));
                           ?>
                      </div> -->
                      
                      <div class="form-group">
                      <br>
                        <label>Short Description</label>
                        <?php echo $this->Form->input('short_desc',array('default'=>$article['Article']['short_desc'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                      </div>
                      <div class="form-group">
                      <label>Select sub Categories</label>
                      <?php echo $this->Form->input('multi_sub_cat',array('div'=>false,'label'=>false,'class'=>'multiple form-control','options'=>$cat_list,'default'=>$cat_list_selected,'id'=>'sub_cat','multiple' => true)); ?>
                      </div>
                      <div class="form-group">
                      <label class="control-label">Content</label>
                           <?php echo $this -> Form -> input('content', array('default'=>$article['Article']['content'],'type'=>'textarea','div' => false,'required' =>'required', 'label' => false, 'title' => 'Content Description', 'class' => 'form-control', 'id' => 'article-content','style'=>'margin: 0px -0.5px 0px 0px;')); ?>
                      </div>
                      <div class="row">
                    <hr />
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Current Primary Photo</label>
                            <div class="col-sm-10">
                                <?php 
                                    echo $this->Html->image('/files/'.$table."/".$article['Article']['id']."/".$article['Article']['image'],array('height'=>'200px'));
                                 ?>
                                <br /><br />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Replace Primary Photo (PNG, JPG or GIF) (Size = 500 x 500 )</label>
                            <div class="col-sm-10">
                                <?php echo $this -> Form -> input('image', array('type'=>'file','div' => false, 'label' => false, 'title' => 'Primary Photo', 'id' => 'item-primary-photo'));

                                 ?>
                            </div>
                        </div>
                    </div>                
                </div>
                      
                      
                      <!-- <div class="form-group">                          
                            <label>Select File</label>
                            <?php echo $this->Form->input('image_name', array('class'=>'form-control','title'=>'Image','label' => false, 'type' => 'file'));?>
                            <br>

                            <?php if($article['Article']['image_name'] == "" || $article['Article']['image_name'] == null)
                            {

                            }else { ?>
                                <img src="<?php echo $this->base."/files/article/image_name/".$article['Article']['image_dir']."/small_".$article['Article']['image_name']; ?>" />
                            <?php
                          }
                          ?>
                            
                        </div>  


                      
                      <div class="form-group">
                        <label> Image Caption</label>
                        <?php echo $this->Form->input('caption',array('default'=>$article['Article']['caption'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','type' => 'text')); ?>
                      </div> -->

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