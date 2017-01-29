<?php $this->start('page-wrapper');  ?>

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
                Listing

                <div class="pull-right">
                  <?php
                    echo $this->Html->link('Add',array('controller'=>'AdvertismentTimmings','action'=>'add'),array('class'=>'btn btn-xs btn-success'));
                  ?>                  
                </div>
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>Advertisment</th>
                                  <th>Advertisment Page</th>
                                  <th>Start Time</th>
                                  <th>End Time</th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th>
                                  <th></th> -->
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach($advertismentTimming as $newsdata)
                            {
                              ?>                          
                              <tr class="odd gradeX">
                              <?php echo $this->Form->create('AdvertismentTimming',array('controller'=>'AdvertismentTimmings','action'=>'edit'));
                              echo $this->Form->input('id',array('type'=>'hidden','default'=>$newsdata['AdvertismentTimming']['id'])); ?>
                               
                                  <td>

                                  <?php 
                                      echo $this->Form->input('advertisment_id',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','options'=>$adv,'default'=>$newsdata['AdvertismentTimming']['advertisment_id']));
                                  ?>
                              
                                  </td>
                                  <td>
                                  <?php echo $this->Form->input('advertisment_type_id',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','options'=>$adv_type,'default'=>$newsdata['AdvertismentTimming']['advertisment_type_id'])); ?>
                                  </td>
                                  <td>
                                   <?php echo $this->Form->input('start_time',array('required' =>'required','div'=>false,'label'=>false,'class'=>'form-control','type'=>'text','default'=>$newsdata['AdvertismentTimming']['start_time'])); ?>
                                  </td>
                                   <td>
                                   <?php echo $this->Form->input('end_time',array('required' =>'required','type'=>'text','div'=>false,'label'=>false,'class'=>'form-control','default'=>$newsdata['AdvertismentTimming']['end_time'])); ?>
                                  </td>
                                  <td>
                                  <?php
                                      echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-warning btn-sm left_margin_for_button','onclick'=>'if(confirm("Sure Edit this ?")) return true; else return false;'));
                                    ?>
                                  </td>
                                  <td><?php                                  
                                      echo $this->Html->link('Delete',array('controller'=>'AdvertismentTimmings','action'=>'delete',$newsdata['AdvertismentTimming']['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Press OK to delete ?")) return true; else return false;'));
                                      ?>
                                  </td>
                                <?php echo $this->Form->end();  ?>
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
  
  </div>
  <!-- /.row -->

<?php $this->end('page-wrapper'); ?>