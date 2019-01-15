<?php 
/**
 *
 * Dual-licensed under the GNU GPL v3 and the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Suman (srs81 @ GitHub)
 * @package       plugin
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *                and/or GNU GPL v3 (http://www.gnu.org/copyleft/gpl.html)
 */
 
class UploadHelper extends AppHelper {
	var $helpers = array('Html');
	
	/**
 * Used to determine if methods implementation is used, or bypassed
 *
 * @var boolean
 */
	var $__active = true;

/**
 * Class constructor
 *
 * @param string $base
 */
	function __construct() {
		if (Configure::read('Script.include') === true) {
			parent::__construct();	
			$this->__active = false;
		} else {
			Configure::write('Script.include',false);
			$this->__active = true;
		}
		
	}


	public function view ($model, $id, $edit = false, $delete = false) {
		$dir = Configure::read('AMU.directory');
		if (strlen($dir) < 1) $dir = "files";
		$lastDir = $this->last_dir ($model, $id);
	 $directory =   $dir . DS . $lastDir;		
		$files = glob ("$directory/*");
		$deleteurl 		= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'delete'));
		$downloadurl 	= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'download'));
		
		$select 		= '';
		$attachments 	= '';	
		$count 			= 0;
		
		foreach ($files as $file) {
			$type		= pathinfo($file, PATHINFO_EXTENSION);
			
			$filesize 	= $this->format_bytes (filesize ($file));
			$f 			= basename($file);
			if($f == 'Thumbs.db') continue;
			$baseEncFile= base64_encode ($file);
			if($delete){
			$attachments .= '<dd><img src="' . Router::url("/") . 'ajax_multi_upload/img/fileicons/'.strtolower($type).'.png" alt="'. $f.'"/>&nbsp;<a href="' . $downloadurl . '/' . $baseEncFile . '" class="newlink" >' . $f . '&nbsp;(' . $filesize . ')</a>&nbsp;<a href="' . $deleteurl . '/' . $baseEncFile . '" >class="icon-trash"</a></dd>';
			}else{
				
			$attachments .= '<dd><img src="' . Router::url("/") . 'ajax_multi_upload/img/fileicons/'.strtolower($type).'.png" alt="'. $f.'"/>&nbsp;<a href="' . $downloadurl . '/' . $baseEncFile . '" class="newlink ttt" >' . $f . '&nbsp;(' . $filesize . ')</a></dd>';
			}
			if ($edit) {
				$select .= '<option value="' . $f . '" selected="selected"   title="' . $downloadurl . '/' . $baseEncFile . '">' . $f . '</option>';
			}	
			//$str .= "\n";
			$count++;
		}
		
		if($edit){
			$select = '<select id="' . $model . $id . '" data-placeholder="Click Add to attach files" style="width: 450px;" class="chzn-select" multiple="multiple" name="data[' . $model . '][' . $id . '][]">' . $select . "</select>"; 
		 return $select;
		}
		$style = 'max-height:55px;overflow: hidden;margin:0px;';
		if($count> 3){
			$style = 'max-height:55px;overflow-x: hidden; overflow-y: scroll; margin:0px;';
		}
		if($count >0){
		//$attachments = '<dt>Attachments</dt><dl style="' . $style . '">' . $attachments . '</d1>';
		$attachments = '<dl >' . $attachments . '</d1>';
		return $attachments;
		}
		return '';
		
	}
	
	public function files ($model, $id) {
		$dir = Configure::read('AMU.directory');
		if (strlen($dir) < 1) $dir = "files";
		$lastDir = $this->last_dir ($model, $id);
		$directory =   $dir . DS . $lastDir;		
		$files = glob ("$directory/*");
		$deleteurl 		= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'delete'));
		$downloadurl 	= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'download'));
		
		$select 		= '';
		$attachments 	= '';	
		$count 			= 0;
		$filesArray = array();
		
		foreach ($files as $file) {
			$filesize 	= $this->format_bytes (filesize ($file));
			$f 			= basename($file);
			if($f == 'Thumbs.db') continue;
			$baseEncFile= base64_encode ($file);		
			$filesArray[$count]['downloadurl']= $downloadurl . '/' . $baseEncFile ;
			$filesArray[$count]['basename']= $f  ;
			$filesArray[$count]['filesize']= $filesize  ;
			$filesArray[$count]['deleteurl']= $deleteurl . '/' . $baseEncFile  ;
			$count++;
		}

		return $filesArray;
		
	}

	public function edit ($model, $id,$btn= 'Attach File',$allowExt= array(),$maxFiles=5) {
		
		$dir = Configure::read('AMU.directory');
		if (strlen($dir) < 1) $dir = "files";
		
		$action 		= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'upload'));
		$deleteurl 		= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'delete'));
		$downloadurl 	= $this->Html->url(array('plugin' => 'ajax_multi_upload', 'controller' => 'uploads', 'action' => 'download'));
		$str1 = $this->view ($model, $id, true);
		$template = '<div class="qq-uploader"><div class="qq-upload-drop-area well"><span>Drop files here to attach</span></div><div class="qq-upload-button btn btn-info">'.$btn.'</div><ul class="qq-upload-list"></ul></div>';
		$str = '';
		$webroot = Router::url("/") . "ajax_multi_upload";
		// Replace / with underscores for Ajax controller
		$lastDir = str_replace ("/", "___", $this->last_dir ($model, $id));
		$allowExt = json_encode($allowExt);
		$WEBSITE_URL = WEBSITE_URL;
		if(Configure::read('Script.include')==true){
			
		$str .= <<<END
			
			<link rel="stylesheet" type="text/css" href="$webroot/css/chosen.css" />
			<link rel="stylesheet" type="text/css" href="$webroot/css/fileuploader.css" />
			<script src="$webroot/js/fileuploader.js" type="text/javascript"></script>
			<script src="$webroot/js/chosen.jquery.js" type="text/javascript"></script>
			
			<div id="AjaxMultiUpload$id">
				<noscript>
					 <p>Please enable JavaScript to use file uploader.</p>
				</noscript>
			</div>
			<script src="$webroot/js/fileuploader.js" type="text/javascript"></script>
			<script>    
		var WEBSITE_URL = '$WEBSITE_URL';
var dlg = $("#preview_dialog").dialog({
  autoOpen: false,
  draggable: false,
  resizable: false
});
				
				$(function(){
					   // $("div#preview_dialog" ).dialog({autoOpen: false});	    
					var uploader2 = new qq.FileUploader({
						element: document.getElementById('AjaxMultiUpload$id'),
						action: '$action/$lastDir/$maxFiles',
						debug: true,
						allowedExtensions: $allowExt,
						template: '$template',
						onComplete: function(id, fileName, responseJSON){
							
							if (responseJSON.success){
							
								if($('#'+ '$model' + '$id' +' option[value="' +fileName + '"]').length==0){
									$('#'+ '$model' + '$id' ).append( '<option selected="selected" title="'+ '$downloadurl/' + responseJSON.file +'" value="' +fileName + '">'+fileName+'</option>' );
									$('#'+ '$model' + '$id' ).trigger("liszt:updated");
								}
							}
							if (responseJSON.error){
								$('.qq-upload-fail').hide();
							}
							
						}
						
					});           
				
					$('#'+ '$model' + '$id' ).chosen().change(function(){
						$('#'+ '$model' + '$id' +' option:not(:selected)').each(function(){
							deleteurl = $(this).attr('title').replace("$downloadurl","$deleteurl");
							var self = this;
							$.ajax({url:deleteurl,success:function(){
								$(self).remove();
							}});
							
						});
						//remove();
						$('#'+ '$model' + '$id' ).trigger("liszt:updated");
					} );
					
				});
				
				  
			</script>
END;
		return $str.$str1 ;
        } else {
        Configure::write('Script.include',true);
        	$str .= <<<END
			
			<div id="AjaxMultiUpload$id">
				<noscript>
					 <p>Please enable JavaScript to use file uploader.</p>
				</noscript>
			</div>
			
			<script>    
			
				
				$(function(){
					            
					var uploader1 = new qq.FileUploader({
						element: document.getElementById('AjaxMultiUpload$id'),
						action: '$action/$lastDir/$maxFiles',
						debug: true,
						allowedExtensions: $allowExt,
						template: '$template',
						onComplete: function(id, fileName, responseJSON){
							
							if (responseJSON.success){
							
								if($('#'+ '$model' + '$id' +' option[value="' +fileName + '"]').length==0){
									$('#'+ '$model' + '$id' ).append( '<option selected="selected" title="'+ '$downloadurl/' + responseJSON.file +'" value="' +fileName + '">'+fileName+'</option>' );
									$('#'+ '$model' + '$id' ).trigger("liszt:updated");
								}
							}
							if (responseJSON.error){
								$('.qq-upload-fail').hide();
							}
						}
					});           
				
					$('#'+ '$model' + '$id' ).chosen().change(function(){
						//$('#'+ '$model' + '$id' +' option:not(:selected)').remove();
						$('#'+ '$model' + '$id' +' option:not(:selected)').each(function(){
							deleteurl = $(this).attr('title').replace("$downloadurl","$deleteurl");
							var self = this;
							$.ajax({url:deleteurl,success:function(){
								$(self).remove();
							}});
							
						});
						$('#'+ '$model' + '$id' ).trigger("liszt:updated");
					} );
					
				});
				
				  
			</script>
END;
		return $str.$str1 ;
        
        }
	}
	
	// The "last mile" of the directory path for where the files get uploaded
	function last_dir ($model, $id) {
		return $model . "/" . $id;
	}

	// From http://php.net/manual/en/function.filesize.php
	function format_bytes($size) {
		$units = array(' B', ' KB', ' MB', ' GB', ' TB');
		for ($i = 0; $size >= 1024 && $i < 4; $i++) $size /= 1024;
		return round($size, 2).$units[$i];
	}
    // From http://php.net/manual/en/function.filesize.php
	
}
