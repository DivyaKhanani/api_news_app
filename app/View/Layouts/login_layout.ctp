<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Actonation | Actonate</title>
	<?php
    echo $this->Html->script('jquery-2.1.1.min');  

    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('sb-admin');  
    echo $this->Html->css('font-awesome/css/font-awesome');
    

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>

<body>

    <div id="wrapper">

		<!-- <div id="page-wrapper"> -->
        	<?php echo $this->fetch('page-wrapper'); ?>
        <!-- </div> -->
    
    </div>
    
</body>

</html>