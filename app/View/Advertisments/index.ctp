<?php $this->start('page-wrapper');  ?>

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
                Listing

                <div class="pull-right">
                  <?php
                    echo $this->Html->link('Add',array('controller'=>'advertisments','action'=>'add'),array('class'=>'btn btn-xs btn-success'));
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
                                  <th>Url</th>
                                  <th>active</th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th>
                                  <th></th> -->
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach($advertisment as $newsdata)
                            {
                              ?>                          
                              <tr class="odd gradeX">
                              <?php echo $this->Form->create('Advertisment',array('controller'=>'advertisments','action'=>'edit'));
                              echo $this->Form->input('id',array('type'=>'hidden','default'=>$newsdata['Advertisment']['id'])); ?>
                               
                                  <td>

                                    <?php 
                                  echo $this->Form->input('title',array('default'=>$newsdata['Advertisment']['title'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control'));

                                  ?>
                              
                                  <small style="display: none;"><?php echo $newsdata['Advertisment']['title'] ?></small>
                                  </td>
                                  <td><?php echo $this->Form->input('url',array('default'=>$newsdata['Advertisment']['url'],'required' =>'required','div'=>false,'label'=>false,'class'=>'form-control')); ?>
                                  <small style="display: none;"><?php echo $newsdata['Advertisment']['url'] ?></small>
                                  </td>
                                  <td><?php echo $this->Form->input('active',array('default'=>$newsdata['Advertisment']['active'],'div'=>false,'label'=>false)); ?>
                                    <small style="display: none;"><?php echo $newsdata['Advertisment']['active'] ?></small>
                                  </td>
                                  <td>
                                  <?php
                                      echo $this->Form->input('Save',array('type'=>'submit','label'=>false,'class'=>'btn btn-warning btn-sm left_margin_for_button','onclick'=>'if(confirm("Sure Edit this ?")) return true; else return false;'));
                                       echo $this->Html->link($this->Html->tag('i', '',array('class' => 'fa fa-pencil')),array('controller'=>'advertisments','action'=>'edit',$newsdata['Advertisment']['id']),array('class'=>'btn btn-warning btn-circle', 'escape' => false,'target'=>'_blank'));
                                    ?>
                                  </td>
                                  <td><?php                                  
                                      echo $this->Html->link('Delete',array('controller'=>'advertisments','action'=>'delete',$newsdata['Advertisment']['id']),array('class'=>'btn btn-xs btn-danger btn-default delete-confirm','onclick'=>'if(confirm("Press OK to delete ?")) return true; else return false;'));
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