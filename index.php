<?php
require('core.php');

$widgets = array();

function loop_all_widgets() {

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

}

$string = file_get_contents( ROOT .'data.json');
$data = json_decode($string);
$widgets = $data->widgets;

$current_widget = false;
if( isset($_GET['widget']) ) {
    $current_widget = $_GET['widget'];
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

<nav class="navbar navbar-dools navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://localhost/digital-menu/dashboard"><span class="glyphicon glyphicon-wrench"></span> Dools</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse navbar-ex1-collapse in" style="height: auto;">
        <ul class="nav navbar-nav side-nav">
            <li><h5>Widgets</h5></li>
            <?php
            foreach( $widgets as $widget ) {
                if( $widget->id == $current_widget ){
                    echo '<li class="active"><a href="?widget='.$widget->id.'">'.$widget->name.'</a></li>';
                } else {
                    echo '<li><a href="?widget='.$widget->id.'">'.$widget->name.'</a></li>';
                }
            }
            ?>
        </ul>

        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/digital-menu/settings"><i class="fa fa-gear"></i> Settings</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">

                <?php
                if( $current_widget ) {
                    include( WIDGET_DIR . $current_widget . '/index.php' );
                }
                ?>


        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="resources/js/jquery.min.js"></script>
<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
</html>