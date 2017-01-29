<?php $this->start('page-wrapper');  ?>

<div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">AdvertismentType</h1>
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
                    echo $this->Html->link('Add',array('controller'=>'advertismentTypes','action'=>'add'),array('class'=>'btn btn-xs btn-success'));
                  ?>                  
                </div>
            </div>
  
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Page no</th>
                                  <th>active</th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th>
                                  <th></th> -->
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach($advertismentType as $newsdata)
                            {
                              ?>                          
                              <tr class="odd gradeX">
                              <?php echo $this->Form->create('AdvertismentType',array('controller'=>'advertismentTypes','action'=>'edit'));
                              echo $this->Form->input('id',array('type'=>'hidden','default'=>$newsdata['AdvertismentType']['id'])); ?>
                               
                                  <td>

                                    <?php 
                                  echo $this->Form->input('name',array('default'=>$newsdata['AdvertismentType']['name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control'));

                                  ?>
                              
                                  <small style="display: none;"><?php echo $newsdata['AdvertismentType']['name'] ?></small>
                                  </td>
                                  <td><?php //echo $this->Form->input('page',array('default'=>$newsdata['AdvertismentType']['page'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                                  <?php echo $newsdata['AdvertismentType']['page'] ?>
                                  </td>
                                  <td><?php echo $this->Form->input('active',array('default'=>$newsdata['AdvertismentType']['active'],'div'=>false,'label'=>false)); ?>
                                    <small style="display: none;"><?php echo $newsdata['AdvertismentType']['active'] ?></small>
                                  </td>
                                  <td>
                                  <?php
                                      echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-warning btn-sm left_margin_for_button','onclick'=>'if(confirm("Sure Edit this ?")) return true; else return false;'));
                                    ?>
                                  </td>
                                  <td><?php                                  
                                      echo $this->Html->link('Delete',array('controller'=>'advertismentTypes','action'=>'delete',$newsdata['AdvertismentType']['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Press OK to delete ?")) return true; else return false;'));
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