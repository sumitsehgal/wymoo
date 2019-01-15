<?php
/**
 * Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 *
 * @copyright Copyright 2010, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * PHP version 5
 * CakePHP version 1.3
 
*/

/**
 * AjaxMultiUpload Uploads Controller
 *
 * @package ajax_multi_upload
 * @subpackage uploads.controllers
 */ 
class UploadsController extends AjaxMultiUploadAppController {
/**
 * Controller name
 *
 * @var string
 */
	public $name = "Uploads";
/**
 * Uses
 *
 * @var array
 */
	public $uses = null;
	public $components = array('RequestHandler' );

/**
 * allowedExtensions
 *
 * @var array
 */	
	// list of valid extensions, ex. array("jpeg", "xml", "bmp")
	public $allowedExtensions = array();
/**
 * Upload
 *
 * @param string $dir Directory name
 * @return void
 */	
	public function upload($dir = null,$maxfiles=5) {
		// max file size in bytes
		
		$size = Configure::read ('AMU.filesizeMB');
		if ( strlen( $size ) < 1 ) $size = 4;
		// real path of the directroty 
		$relPath = Configure::read ('AMU.directory');
		//if (strlen($relPath) < 1) $relPath = "files";
	
		$sizeLimit = $size * 1024 * 1024;
		// set layout ajax for this view
		$this->layout = "ajax";
		Configure::write('debug', 0);
		$directory =  $relPath;
		if ($dir === null) {
			$this->set("result", "{\"error\":\"Upload controller was passed a null value.\"}");
			return;
		}
		// Replace underscores delimiter with slash
		$dir = str_replace ("___", "/", $dir);
		$dir = $directory . DS . "$dir/";
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
		$files = glob ("$dir/*");
		if(count($files) >= $maxfiles){
			$result = array('error'=> 'Could not save uploaded file.' .
                'You should not upload files greater  than '.$maxfiles);
			$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}else{
		$uploader = new qqFileUploader($this->allowedExtensions, $sizeLimit);
		
		$result = $uploader->handleUpload($dir, true);
		$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}
	}
/**
 * Admin Upload
 *
 * @param string $dir Directory name
 * @return void
 */		
	public function admin_upload($dir = null ,$maxfiles=5) {
		// max file size in bytes
		$size = Configure::read ('AMU.filesizeMB');
		if (strlen($size) < 1) $size = 4;
		// real path of the directroty 
		$relPath = Configure::read ('AMU.directory');
		//if (strlen($relPath) < 1) $relPath = "files";
	
		$sizeLimit = $size * 1024 * 1024;
		// set layout ajax for this view
		$this->layout = "ajax";
		//Configure::write('debug', 0);
		$directory =  $relPath;
		if ($dir === null) {
			$this->set("result", "{\"error\":\"Upload controller was passed a null value.\"}");
			return;
		}
		// Replace underscores delimiter with slash
		$dir = str_replace ("___", "/", $dir);
		$dir = $directory . DS . "$dir/";
		if (!file_exists($dir)) {
			mkdir($dir, 0777, true);
		}
		$files = glob ("$dir/*");
		if(count($files) >= $maxfiles){
			$result = array('error'=> 'Could not save uploaded file.' .
                'You should not upload files greater  than '.$maxfiles);
			$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}else{
		
		$uploader = new qqFileUploader($this->allowedExtensions, $sizeLimit);
		
		$result = $uploader->handleUpload($dir, true);
		
		$this->set("result", htmlspecialchars(json_encode($result), ENT_NOQUOTES));
		}
	}
	
/**
 * Delete
 *
 * @param string $file File name
 * @return void
 */		
	public function delete($file = null) {
		if (is_null($file)) {
			//$this->Session->setFlash(__('File parameter is missing'), 'error');
			$this->redirect($this->referer());
		}
		$file = base64_decode($file);
		if (file_exists($file)) {
			if (unlink($file)) {
			//	$this->Session->setFlash(__('File deleted!'), 'success');
			} else {
				//$this->Session->setFlash(__('Unable to delete File'), 'error');
			}
		} else {
			//$this->Session->setFlash(__('File does not exist!', 'error'));
		}
		if (!$this->RequestHandler->isAjax()) {
		 exit;
		}
		$this->redirect($this->referer());
	}
/**
 * Admin Delete
 *
 * @param string $file File name
 * @return void
 */		
	public function admin_delete($file = null) {
		if (is_null($file)) {
			//$this->Session->setFlash(__('File parameter is missing', 'error'));
			$this->redirect($this->referer());
		}
		$file = base64_decode($file);
		if (file_exists($file)) {
			if (unlink($file)) {
				//$this->Session->setFlash(__('File deleted!'), 'success');
			} else {
				//$this->Session->setFlash(__('Unable to delete File'), 'error');
			}
		} else {
			//$this->Session->setFlash(__('File does not exist!'), 'error');
		}
		if (!$this->RequestHandler->isAjax()) {
		 exit;
		}
		$this->redirect($this->referer());
	}
/**
 * Download
 *
 * @param string $file File name
 * @return void
 */		
	public function download($file = null,$view=0) {
		$this->layout = false;
		if (is_null($file)) {
			//$this->Session->setFlash(__('File parameter is missing'), 'error');
			$this->redirect($this->referer());
		}
		$file = base64_decode($file);
		if($view == 1){
			$filepath  = explode("files/",$file);
			//$filepath  = explode("files\\",$file);
			
			//$readdata = exif_read_data($file, 0, true);
			//echo 'image.php?image/files/'.$filepath[1].'&height=100px&width=100px';exit;
			echo '<table class="tblcaselist" style="width:270px;border-top: 1px ridge;border-left: 1px ridge;" align="center" cellpadding="0" cellspacing="0">
			<tr><td class="even" colspan="2" align="center" style="margin:0px;padding:0px;"><img src="'. Router::url('/', true)
 .'image.php?image=/files/'.$filepath[1].'&height=200px&width=270px"></td></tr>';
			
			//echo $file;
			$path_parts = pathinfo($file);
			//pr($path_parts);
			echo  '<tr><td class="odd" width="70">File Name: </td><td class="odd"><div style="word-wrap:break-word; width:150px;">' . $path_parts['basename'] .'</div></td></tr>';
			echo  '<tr><td class="odd">File Size: </td><td class="odd">'. round((filesize($file)) / 1024, 2) .' KB</td></tr>';
			echo  '<tr><td class="odd">Uploaded Time: </td><td class="odd">'.date("F d Y H:i:s.", filectime($file)) .'</td></tr>';
					
			/*$exif = @exif_read_data ($file, 0, true);
			if($exif){
			foreach ($exif as $key => $section) {
				foreach ($section as $name => $val) {
					echo  '<tr><td class="odd">'."$key.$name:" . '</td><td class="odd">'. " $val" .'</td></tr>';
				}
			}
			}*/
			//echo '<tr><td class="odd"></td><td class="odd"></td></tr>';
			echo '</table>';
			//$this->redirect('image.php?image/files/'.$filepath[1].'&height=100px&width=100px');
			exit;
			
		}
		if (file_exists($file)) {
			$this->downloadFile('', $file);
		} else {
			//$this->Session->setFlash(__('File does not exist!'), 'error');
		}
		
		$this->redirect($this->referer());
	}
/**
 * Admin Download
 *
 * @param string $file File name
 * @return void
 */		
	public function admin_download($file = null,$view=0) {
		$this->layout = false;
		if (is_null($file)) {
			//$this->Session->setFlash(__('File parameter is missing'), 'error');
			$this->redirect($this->referer());
		}
		$file = base64_decode($file);
		if($view == 1){
			$filepath  = explode("files/",$file);
			//$filepath  = explode("files\\",$file);

			//$readdata = exif_read_data($file, 0, true);
			//echo 'image.php?image/files/'.$filepath[1].'&height=100px&width=100px';exit;
			echo '<table class="tblcaselist" style="width:270px;border-top: 1px ridge;border-left: 1px ridge;" align="center" cellpadding="0" cellspacing="0">
			<tr><td class="even" colspan="2" align="center" style="margin:0px;padding:0px;"><img src="'. Router::url('/', true) .'image.php?image=/files/'.$filepath[1].'&height=200px&width=270px"></td></tr>';
			
			//echo $file;
			$path_parts = pathinfo($file);
			//pr($path_parts);
			echo  '<tr><td class="odd">File Name: </td><td class="odd"><div style="word-wrap:break-word; width:150px;">' . $path_parts['basename'] .'</div></td></tr>';
			echo  '<tr><td class="odd">File Size: </td><td class="odd">'. round((filesize($file)) / 1024, 2) .' KB</td></tr>';
			echo  '<tr><td class="odd">Uploaded Time: </td><td class="odd">'.date("F d Y H:i:s.", filectime($file)) .'</td></tr>';
					
			/*$exif = @exif_read_data ($file, 0, true);
			if($exif){
			foreach ($exif as $key => $section) {
				foreach ($section as $name => $val) {
					echo  '<tr><td class="odd">'."$key.$name:" . '</td><td class="odd">'. " $val" .'</td></tr>';
				}
			}
			}*/
			//echo '<tr><td class="odd"></td><td class="odd"></td></tr>';
			echo '</table>';
			//$this->redirect('image.php?image/files/'.$filepath[1].'&height=100px&width=100px');
			exit;
			
		}
	
		if (file_exists($file)) {
			$this->downloadFile('', $file);
		} else {
			//$this->Session->setFlash(__('File does not exist!'), 'error');
		}
		
		$this->redirect($this->referer());
	}
}

?>