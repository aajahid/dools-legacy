<?php

require('../core.php');

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