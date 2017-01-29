<?php $this->start('page-wrapper');  ?>
<?php 
        $this->start('script');
        echo $this->Html->script('jquery-ui', array('inline' => false));
        echo $this->fetch('script');
        
        $this->end();
?>
<script>
    $(function() {
      $("#next").click(function() {
        //alert($("#sub_cat option:selected").text());
        window.location.href=myBaseUrl+"articles/index/"+$("#sub_cat option:selected").text()+"/1";
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
  <?php if(isset($article)){ ?>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              
            <div class="panel-heading">
                Listing

                <div class="pull-right">
                  <?php
                    echo $this->Html->link('Add',array('controller'=>'articles','action'=>'add'),array('class'=>'btn btn-xs btn-success'));
                  ?>                  
                </div>
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>Title</th>
                                  <th>Short Description</th>
                                  <th>Active</th>
                                  <th>Schedule Date</th>
                                  <th>Created</th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th>
                                  <th></th> -->
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach($article as $newsdata)
                            {
                              ?>                          
                              <tr class="odd gradeX">
                                  <td><?php echo $newsdata['title']; ?>
                                  
                                  </td>
                                  <td><?php echo $newsdata['short_desc']; ?></td>
                                  <td><?php echo $newsdata['active']==1?"Yes":"No"; ?></td>
                                  
                                  <td>
                                    <?php if($newsdata['schedule_time'] == "0000-00-00 00:00:00")
                                  {
                                    echo ' - ';
                                  }else{
                                    echo date('h:i a F d, Y', strtotime($newsdata['schedule_time'])) ;
                                  } ?>
                                  </td>
                                  <td>
                                     <?php echo date('h:i a F d, Y', strtotime($newsdata['created_date'])) ; ?> 
                                  </td>
                                   <td><?php
                                      echo $this->Html->link('Edit',array('controller'=>'articles','action'=>'edit',$table,$newsdata['id']),array('class'=>'btn btn-xs btn-warning'));
                                      echo $this->Html->link('SendN',array('controller'=>'articles','action'=>'send_notification',$table,$newsdata['id']),array('class'=>'btn btn-xs btn-warning'));
                                    ?>
                                  </td>
                                  <td><?php                                  
                                      echo $this->Html->link('Delete',array('controller'=>'articles','action'=>'delete',$newsdata['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Press OK to delete ?")) return true; else return false;'));
                                      ?>
                                  </td>
                                 <!--  <td>
                                  <?php 
                                      if($newsdata['published'] == 1) {
                                         
                                        } else {
                                          echo $this->Html->link('Publish',array('controller'=>'articles','action'=>'publish',$newsdata['id']),array('class'=>'btn btn-xs btn-primary btn-default delete-confirm','onclick'=>'if(confirm("Press OK to publish ?")) return true; else return false;')); 
                                        }
                                      ?>                                
                                      
                                      
                                  </td>

                                  <td>
                                  <?php 
                                      if($newsdata['notification'] == 0) {
                                         
                                          echo $this->Html->link('Send Notification',array('controller'=>'articles','action'=>'send_onesignal',$newsdata['id']),array('class'=>'btn btn-xs btn-primary btn-default delete-confirm','onclick'=>'if(confirm("Do you want to send the notification to all registered devices ?")) return true; else return false;')); 
                                        } else {

                                          echo $this->Html->link('Send Notification',array('controller'=>'articles','action'=>'send_onesignal',$newsdata['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Do you want to send the notification to all registered devices ?")) return true; else return false;'));
                                        }
                                      ?>                                
                                      
                                      
                                  </td> -->
                                  </tr>                              
                              <?php
                            }
                            ?>                              
                          </tbody>
                      </table>
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <?php }else{ ?>
    <div class="form-group">
      <label>Select Table, to see articles </label>
      <?php echo $this->Form->input('sub_catid',array('div'=>false,'label'=>false,'class'=>'form-control','options'=>$cat_list,'id'=>'sub_cat','required'=>'required')); ?>
      <?php echo $this->Form->input('sub_catname',array('div'=>false,'label'=>false,'class'=>'form-control','id'=>"sub_catname",'type'=>'hidden')); ?>
    </div>
   <div class="form-group col-lg-12">
      <?php echo $this->Form->input('See',array('type'=>'button','label'=>false,'class'=>'btn btn-success btn-sm left_margin_for_button','id'=>'next')); ?>
    </div>



  <?php
    } ?>
  
  </div>
  <!-- /.row -->

<?php $this->end('page-wrapper'); ?>