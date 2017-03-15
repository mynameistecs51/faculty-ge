<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Douploads{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('myupload');
	}

	public function read_files($ID,$ctl,$tranCode)
	{
		$mainPath = './file_upload/';
		$ctlPath  = $mainPath.$ctl.'/';
		$tranPath = $ctlPath.$tranCode.'/';
		$path     = $tranPath;
		$data     = [];
		if (is_dir($path) === true)
		{
			$files = array_diff(scandir($path), array('.', '..'));

			foreach ($files as $file)
			{
            $search=explode("_",$file); //แยกตาม ID
            if($search[1]==$ID)
            {
            	$extension = pathinfo($file , PATHINFO_EXTENSION);
            	$data[]  = array('file_name' => $file ,
            		'file_size' => $this->Size($path.$file),
            		'file_ext'  => ".".$extension,
            		);
            }
          }
        }
        return $data;
      }

      public function delete_files($ctl,$tranCode,$postFiles)
      {
      	$mainPath = './file_upload/';
      	$ctlPath  = $mainPath.$ctl.'/';
      	$tranPath = $ctlPath.$tranCode.'/';
      	$path = $tranPath;
      	$data = [];
      	if (is_dir($path) === true)
      	{
      		if (is_file($path.$postFiles) === true)
      		{
      			unlink($path.$postFiles);
      		}
      	}
      }

      public function deleteFiles($files,$ctl,$tranCode)
      {
      	$mainPath = './file_upload/';
      	$ctlPath  = $mainPath.$ctl.'/';
      	$tranPath = $ctlPath.$tranCode.'/';
      	$path = $tranPath;
  $listfiles = $this->scan_dir($path); // find last code run num AND orderby DESC
  foreach ($listfiles as $file) {
  	$ls=explode("_",$file);
  	if($ls[1]==$files)
  	{
  		if (is_file($path.$file) === true)
  		{
  			unlink($path.$file);
  		}
  	}
  }
}

public function postFiles($files,$ctl,$tranCode)
{
	$path = $this->MakeFolderPath($ctl,$tranCode);
	$newfile = $this->MakeFileName($files,$path,$tranCode);

	 	    // Define file rules
	$this->CI->myupload->initialize(
		array(
		"upload_path"       =>  $path,
		"allowed_types"     =>  "gif|jpg|png|pdf",
		"max_size"          =>  '',
		"file_name"         =>  $newfile,
                //"max_width"         =>  '1024',
                //"max_height"        =>  '768'
		));
	$errors = [];
	$success= [];
	if($this->CI->myupload->do_multi_upload($files))
	{
            	// Output the success
		$success = $this->CI->myupload->get_multi_upload_data();
	} else {
                // Output the errors
		$errors = array('error' => $this->CI->myupload->display_errors('<p class = "bg-danger">', '</p>'));
	}

	$data = array('success' => $success, 'error'=> $errors);
	return $data;
}

private function MakeFolderPath($ctl,$tranCode)
{
	$mainPath = './file_upload/';
	$ctlPath  = $mainPath.$ctl.'/';
	$tranPath = $ctlPath.$tranCode.'/';
	$CTLvalidate = '';
	$TRANvalidate = '';

	if(is_dir($ctlPath))
	{
		$CTLvalidate = true ;
	}else
	{
		if(mkdir($ctlPath)){$CTLvalidate = true;}else{$CTLvalidate = false;}
	}

	if($CTLvalidate)
	{
		if(is_dir($tranPath))
		{
			$TRANvalidate = true ;
		}else
		{
			if(mkdir($tranPath)){$TRANvalidate = true;}else{$TRANvalidate = false;}
		}
	}

	if($TRANvalidate)
	{
		return $tranPath;
	}
	else
	{
		return '';
	}

}

private function MakeFileName($files,$path,$tranCode)
{
	$total = count($_FILES[$files]['tmp_name']);
	$newname = [];
	$num=0;
        $lastnum = $this->scan_dir($path); // find last code run num AND orderby DESC
        if($lastnum[0]){$lsnum=explode("_",$lastnum[0]); $count=$lsnum[2];}else{$count=0;}
        if($count != 0){$ls =explode('.',$count); $count=$ls[0];}
        for ($i=0; $i < $total; $i++) {
        	$num++;
        	$extension = pathinfo($_FILES[$files]['name'][$i] , PATHINFO_EXTENSION);
        	$running = $count+$num;
        	$run= sprintf("%03d", $running);
        	$newname[] = $tranCode.'_'.$files.'_'.$run.'.'.$extension;
        }

        return $newname;
      }

      private function scan_dir($dir)
      {
      	$ignored = array('.', '..', '.svn', '.htaccess');

      	$files = array();
      	foreach (scandir($dir,1) as $file) {
      		if (in_array($file, $ignored)) continue;
      		$files[$file] = filemtime($dir . '/' . $file);
      	}
      	$files = array_keys($files);
      	return ($files) ? $files : false;
      }

      private function CountFolderFiles($directory)
      {
      	$count=0;

      	if (glob($directory . "*.*") != false)
      	{
      		$filecount = count(glob($directory . "*.*"));
      		$count = $filecount;
      	}
      	else
      	{
      		$count;
      	}

      	return $count;
      }
      private function Delete($path)
      {
      	if (is_dir($path) === true)
      	{
      		$files = array_diff(scandir($path), array('.', '..'));

      		foreach ($files as $file)
      		{
      			$this->Delete(realpath($path) . '/' . $file);
      		}

      		return rmdir($path);
      	}

      	else if (is_file($path) === true)
      	{
      		return unlink($path);
      	}

      	return false;
      }

      private function Size($path)
      {
      	$bytes = sprintf('%u', filesize($path));

      	if ($bytes > 0)
      	{
      		$unit = intval(log($bytes, 1024));
      		$units = array('B', 'KB', 'MB', 'GB');

      		if (array_key_exists($unit, $units) === true)
      		{
      			return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
      		}
      	}
      	return $bytes;
      }

    }
    ?>