<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <script type="text/javascript">
        var myBaseUrl = '<?php echo Router::url('/', true); ?>';
    </script>
    <title>Gujarat Samachar | NEWS CMS</title>
	
	<?php
    //echo $this->Html->meta('icon');

    echo $this->Html->script('jquery-2.1.1.min');
    echo $this->Html->script('jquery-ui');
    echo $this->Html->script('bootstrap-timepicker');   
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('plugins/metisMenu/jquery.metisMenu');
    echo $this->Html->script('sb-admin');   
    echo $this->Html->script('plugins/dataTables/jquery.dataTables');   
    echo $this->Html->script('plugins/dataTables/dataTables.bootstrap');
    // echo $this->Html->script('ckeditor');
    // echo $this->Html->script('ckeditor/adapters/jquery');
    // echo $this->Html->script('ckeditor/ckeditor');
    	

    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('font-awesome/css/font-awesome');
    echo $this->Html->css('sb-admin');
    echo $this->Html->css('plugins/dataTables/dataTables.bootstrap');
	echo $this->Html->css('jquery-ui');
    echo $this->Html->css('bootstrap-timepicker');
    echo $this->Html->css('polka');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
  
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTables-example').dataTable({
                "order": [[ 4, "desc" ]],
                columnDefs: [{ visible: false, target: 3}]
            });
            setTimeout($('.alert').fadeOut(5000), 0);

            // $("#created_date").remove();
            // $(".created_date_1").remove();
        }); 
    </script>


</head>

<body style="overflow-x: hidden;">

    <?php
        echo $this->Session->flash('error');
        echo $this->Session->flash('success');
        echo $this->Session->flash('notice');
    ?>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>            
                <a class="navbar-brand" href="index.html"><?php echo $this->Html->image('actonate.png', array('alt' => 'GS','style'=>'width:30%;')); ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <i class="fa fa-caret-down">&nbsp;&nbsp;Hi, <?php echo $activeUser['User']['first_name']; ?></i>
                    </a>

                    <ul class="dropdown-menu dropdown-user">    
                        <li>
                        	<?php
                            echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-gear fa-fw')) . "Change Password",array('controller' => 'crm_admin_users', 'action' => 'change_password'),array('escape' => false));
                            ?>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <?php
                            echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-sign-out fa-fw')) . "Logout",array('controller' => 'crm_admin_users', 'action' => 'logout'),array('escape' => false));
                            ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    
                    <li>
                        <a href="<?php echo Router::url(array('controller'=>'home', 'action'=>'index'))?>"><i class="fa fa-dashboard fa-fw"></i> Home</a>                    	
                    </li>
                    <!-- <li>        
                        <a href="<?php echo Router::url(array('controller'=>'configurations', 'action'=>'index'))?>"><i class="fa fa-wrench fa-fw"></i> Configuration</a>
                    </li> -->
                   <!--  <li>
                        <a href="#"><i class="fa fa-instagram fa-fw"></i> Gallery<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'galleries','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'galleries','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>      -->               
                    <!-- <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Menus<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'menus','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'menus','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>                      
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Tabs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'tabs','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'tabs','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>           -->          
                    <!-- <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Widget<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'widgets','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'widgets','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>     -->

                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> News<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'articles','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'articles','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> News Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'categories','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'categories','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> News Sub Category<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'sub_categories','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'sub_categories','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li> 
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Advertisment<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'Advertisments','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'Advertisments','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Advertisment Types<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'AdvertismentTypes','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'AdvertismentTypes','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Advertisment Timmings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'AdvertismentTimmings','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'AdvertismentTimmings','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li>
                     <!-- <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Events<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'events','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'events','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li> 
                     <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Coupons<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?php echo $this->Html->link('Listing',array('controller'=>'coupons','action'=>'index')) ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Add',array('controller'=>'coupons','action'=>'add')) ?>
                            </li>
                        </ul>                    
                        
                    </li> 
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Numbers<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Number Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo $this->Html->link('Listing',array('controller'=>'ContactTypes','action'=>'index')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add',array('controller'=>'ContactTypes','action'=>'add')) ?>
                                </li>
                            </ul>                     
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Number<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo $this->Html->link('Listing',array('controller'=>'Contacts','action'=>'index')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add',array('controller'=>'Contacts','action'=>'add')) ?>
                                </li>
                            </ul>                     
                        </li>                            
                          </ul>               
                        
                    </li>                  
 -->
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        
        <!-- /.navbar-static-side -->
		<div id="page-wrapper">
        
            <?php echo $this->fetch('page-wrapper'); ?>
        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <?php
     if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
    ?>  
    




</body>

</html>