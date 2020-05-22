<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageManipulationController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load->library('image_lib');
		
		$folder = '';        
        switch ($this->uri->segment(1)) {
            case 'gambar':
                $folder = 'image';
                break;
            case 'galeri':
                $folder = 'gallery';
                break;
            case 'media':
                $folder = 'media';                
                break;
            default:
                $folder = 'image';
                break;
        }        
        $resize = explode('x',$this->uri->segment(2));

        $imagess = FCPATH.$folder.DIRECTORY_SEPARATOR.str_replace('%20', ' ', $this->uri->segment(3));     

        if(file_exists($imagess)){            
            switch (getimagesize($imagess)['mime']) {
                case 'image/jpeg':
                $image = imagecreatefromjpeg($imagess);
                break;
                case 'image/png':
                $image = imagecreatefrompng($imagess);
                break;
                case 'image/gif':
                    $image = imagecreatefromgif($imagess);
                    break;                
                default:
                    $imagess = FCPATH.'img'.DIRECTORY_SEPARATOR.'noimg.jpg';
                    $image = imagecreatefromjpeg($imagess);
                    break;
            }
        }else{
            $imagess = FCPATH.'img'.DIRECTORY_SEPARATOR.'noimg.jpg';
            $image = imagecreatefromjpeg($imagess);
        }        
            
        $thumb_width = (int)$resize[0];
        $thumb_height = (int)$resize[1];

        $width = imagesx($image);
        $height = imagesy($image);
        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;
        if ( $original_aspect >= $thumb_aspect )
        {       
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
            $config['master_dim'] = 'widthheight';           
        }
        else
        {       
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
            $config['master_dim'] = 'width';            
        }  

       
        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
        imagecopyresampled($thumb,$image,0 - ($new_width - $thumb_width) / 2,0 - ($new_height - $thumb_height) / 2,0, 0,$new_width, $new_height,$width, $height);
        // header("Content-Disposition: inline; filename=\"" . str_replace('%20', ' ', $name_image) . "\"");        
        switch (getimagesize($imagess)['mime']) {
            case 'image/jpeg':
                header("Content-type: image/jpeg");   
                imagejpeg($thumb, null, 75);                
                break;
            case 'image/png':
                header("Content-type: image/png");
                $transparant = imagecolorallocate($thumb, 255, 255, 255);
                imagefill($thumb,0,0,$transparant);
                imagecolortransparent($thumb, $transparant);
                imagepng($thumb);
                break;
            case 'image/gif':
                header("Content-type: image/gif");   
                imagejpeg($thumb, null, 75);
                break;                
            default:                
                header("Content-type: image/jpeg");   
                imagejpeg($thumb, null, 75);
                break;
        }
        imageDestroy($thumb); 
	}

}

/* End of file ImageManipulationController.php */
/* Location: ./application/controllers/Main/ImageManipulationController.php */