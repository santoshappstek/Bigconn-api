<?php
namespace App\Helpers;
use Image;
use Video;
use File;
use Illuminate\Support\Facades\Storage;

class Helper{


    
   public static function upload_file($file,$path)
    {
                $get_type = explode( ';', $file );
                $file_type = explode( '/', $get_type[0] )[1];
                if ( !File::isDirectory( public_path().'/'.$path.'/' ) ) {
                    File::makeDirectory( public_path().'/'.$path.'/', 0755, true, true );
                }
                /*$file_size = File::getSize($file);*/
                //need to find file type  like video image and pdf
                //$file = file_get_contents($file);
                //$file = Image::make($file);
                $list = explode( ',', $file );
                $binary_file = base64_decode( $list[1] );
                $filename = time() .'-'.'file.'.$file_type;
                
                $file_dir_name = '/'.$path.'/'.$filename;
                $file_full_path = public_path().$file_dir_name;

                $file = fopen( $file_full_path, 'wb' );
                fwrite( $file, $binary_file );
                fclose( $file );
                Image::make( $binary_file )->save( $file_full_path );

                /*$x=Image::make( $binary_file )->save( $file_full_path );
                $filesize = $x->filesize();*/

                return $filename;       
    }
}

 