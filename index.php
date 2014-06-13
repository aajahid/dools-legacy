<?php
require('core.php');

$widgets = array();


if ($handle = opendir(WIDGET_DIR)) {
    while (false !== ($widgetFolder = readdir($handle))) {
        if ($widgetFolder != "." && $widgetFolder != ".." && is_dir(WIDGET_DIR.$widgetFolder) ) {

        	

        	if( $widgetFolderHandle = opendir(WIDGET_DIR.$widgetFolder) ) {
        		while(false !== ($widgetFolderFiles = readdir($widgetFolderHandle))) {
	            	if( $widgetFolderFiles == 'config.json' ) {
	            		$string = file_get_contents(WIDGET_DIR.$widgetFolder.'/config.json');
	            		$widget = json_decode($string);
	            		if( isset($widget->id) && isset($widget->name) && isset($widget->index) ) {
	            			$widget->dir = WIDGET_DIR.$widgetFolder.'/';
	            			$widget->index = $widget->dir.$widget->index;
	            			$widgets[] = $widget;
	            		}
	            	}
	            }
	            closedir($widgetFolderHandle);
        	}


        }
    }
    closedir($handle);
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Tools</title>
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"> <span class="glyphicon glyphicon-wrench"></span> Dools</h1>
				<p class="lead text-center">
					Dools is a set of small frequently used <b>D</b>eveloper t<b>ools</b>
				</p>
			</div>
		</div>
	
	<?php
		$x = 1;
		foreach( $widgets as $widget ){
			
			if($x == 3) echo '<div class="row">';
			?>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><b><?php echo $widget->name ?></b></div>
				  	<div class="panel-body">
				    	 <?php include($widget->index) ?>
				  	</div>
				</div>
			</div>
				
			<?php
			if($x == 3) echo '</div>';
			
		}
	?>

	</div>
</body>
<script type="text/javascript" src="resources/js/jquery.min.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
</html>