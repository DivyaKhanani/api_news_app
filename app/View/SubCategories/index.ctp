<?php $this->start('page-wrapper');  ?>

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
                Listing

                <div class="pull-right">
                  <?php
                    echo $this->Html->link('Add',array('controller'=>'sub_categories','action'=>'add'),array('class'=>'btn btn-xs btn-success'));
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
                                  <th>Order no</th>
                                  <th>App Active</th>
                                  <th>Category</th>
                                  <th>Table Name</th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th>
                                  <th></th> -->
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach($sub_category as $newsdata)
                            { 
                              ?>                          
                              <tr class="odd gradeX">
                                
                                <?php echo $this->Form->create('SubCategory',array('controller'=>'sub_categories','action'=>'edit'));
                              echo $this->Form->input('id',array('type'=>'hidden','default'=>$newsdata['SubCategory']['id'])); ?>
                               
                                  <td>

                                  <?php 
                                  echo $this->Form->input('name',array('default'=>$newsdata['SubCategory']['name'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control'));

                                  ?>
                              
                                  <small style="display: none;"><?php echo $newsdata['SubCategory']['name'] ?></small>
                                 
                                  </td>
                                  <td><?php echo $this->Form->input('order',array('default'=>$newsdata['SubCategory']['order'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                                  <small style="display: none;"><?php echo $newsdata['SubCategory']['order'] ?></small>
                                  </td>
                                  <td><?php echo $this->Form->input('app_active',array('default'=>$newsdata['SubCategory']['app_active'],'div'=>false,'label'=>false)); ?>
                                    <small style="display: none;"><?php echo $newsdata['SubCategory']['app_active'] ?></small>
                                  </td>
                                  <td><?php echo $this->Form->input('category',array('default'=>$newsdata['SubCategory']['category'],'options' =>$cat_list,'div'=>false,'label'=>false,'class'=>'form-control')); ?>
                                  <small style="display: none;"><?php echo $newsdata['Category']['name'] ?></small>
                                  </td>
                                  <td>
                                    <?php echo $newsdata['SubCategory']['app_table_name'] ?>
                                  </td>
                                   <td><?php
                                   echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-warning btn-sm left_margin_for_button','onclick'=>'if(confirm("Sure Edit this ?")) return true; else return false;'));

                                      //echo $this->Html->link('Edit',array('controller'=>'sub_categories','action'=>'edit',$newsdata['SubCategory']['id']),array('class'=>'btn btn-xs btn-warning'));
                                    ?>
                                  </td>
                                  <td><?php                                  
                                      echo $this->Html->link('Delete',array('controller'=>'sub_categories','action'=>'delete',$newsdata['SubCategory']['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Press OK to delete ?")) return true; else return false;'));
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