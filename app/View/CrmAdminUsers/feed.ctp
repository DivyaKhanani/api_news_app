<?php
	$this->start('main_content');
?>
<?php

	$all_user_list = json_decode($message,true);
//	echo "<pre>";
//	print_r($obj);

?>	
	
                <div class="col-lg-12">
                    <div class="panel panel-default" style="border: none;">
                        <!-- <div class="panel-heading">
                            Striped Rows
                        </div> -->
                        <!-- /.panel-heading -->
                        <div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Name</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <!-- <th>Detail</th> -->
                                            <!-- <th>Edit</th> -->
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $flag = 1;
                                    foreach($all_user_list as $all_user_list_read)
									{
										echo "<tr>";
											echo "<td>".$flag."</td>";
											echo "<td>".$all_user_list_read['User']['first_name']."  ".$all_user_list_read['User']['last_name']."</td>";
											echo "<td>".$all_user_list_read['User']['username']."</td>";
											echo "<td>".$all_user_list_read['User']['email']."</td>";
											echo "<td>".$all_user_list_read['User']['mobile']."</td>";
								//			echo "<td>".$this->Html->link('Detail',array('controller'=>'users','action'=>'detailUser',$all_user_list_read['User']['id']))."</td>";
								//			echo "<td>".$this->Html->link('Edit',array('controller'=>'users','action'=>'editUser',$all_user_list_read['User']['id']))."</td>";
											if($all_user_list_read['User']['is_enabled'] == 0)
											{
												echo "<td>".$this->Html->link('Enable',array('controller'=>'users','action'=>'deleteUser',$all_user_list_read['User']['id'],1))."</td>";
											}
											else 
											{
												echo "<td>".$this->Html->link('Disable',array('controller'=>'users','action'=>'deleteUser',$all_user_list_read['User']['id'],0))."</td>";
											}
											
										echo "</tr>";
										
										$flag++;
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
            



<?php

	$this->end('main_content');
?>