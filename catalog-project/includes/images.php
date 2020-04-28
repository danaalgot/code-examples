<?php 
	function resizeImage($file, $folder, $filename, $newwidth, $orientation){
		if ($_FILES['uploadimage']['type'] == "image/jpeg") {
 			list($width, $height) = getimagesize($file);
			$imageratio = $width/$height;
			$newHeight = $newwidth/$imageratio;

			$thumb = imagecreatetruecolor($newwidth, $newHeight); //new small
			$source = imagecreatefromjpeg($file); //origional large

			//resize
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newHeight, $width, $height);

			switch($orientation) {
	            case 8:
	                $thumb = imagerotate($thumb,90,0);
	                break;
	            case 3:
	                $thumb = imagerotate($thumb,180,0);
	                break;
	            case 6:
	                $thumb = imagerotate($thumb,-90,0);
	                break;
	        }

			//output to file
			$newFileName = $folder . $filename;
			imagejpeg($thumb, $newFileName, 80);
			imagedestroy($thumb);
			imagedestroy($source);
 		} else if ($_FILES['uploadimage']['type'] == "image/png") {
 			list($width, $height) = getimagesize($file);
			$imageratio = $width/$height;
			$newHeight = $newwidth/$imageratio;

			$thumb = imagecreatetruecolor($newwidth, $newHeight); //new small
			$source = imagecreatefrompng($file); //origional large

			//resize
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newHeight, $width, $height);

			switch($orientation) {
		        case 8:
		            $thumb = imagerotate($thumb,90,0);
		            break;
		        case 3:
		            $thumb = imagerotate($thumb,180,0);
		            break;
		        case 6:
		            $thumb = imagerotate($thumb,-90,0);
		            break;
		    }

			//output to file
			$newFileName = $folder . $filename;
			imagepng($thumb, $newFileName, 8);
			imagedestroy($thumb);
			imagedestroy($source);
 		}
	}

	function createSquareImageCopy($file, $folder, $filename, $newWidth, $orientation){
		if ($_FILES['uploadimage']['type'] == "image/jpeg") {
			$thumb_width = $newWidth;
			$thumb_height = $newWidth;// tweak this for ratio
			list($width, $height) = getimagesize($file);
			$original_aspect = $width / $height;
			$thumb_aspect = $thumb_width / $thumb_height;

			if($original_aspect >= $thumb_aspect) {
			   // If image is wider than thumbnail (in aspect ratio sense)
			   $new_height = $thumb_height;
			   $new_width = $width / ($height / $thumb_height);
			} else {
			   // If the thumbnail is wider than the image
			   $new_width = $thumb_width;
			   $new_height = $height / ($width / $thumb_width);
			}

			$source = imagecreatefromjpeg($file);
			$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

			// Resize and crop
			imagecopyresampled($thumb,
							   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
							   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
							   0, 0,
							   $new_width, $new_height,
							   $width, $height);

	        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newHeight, $width, $height);

	        switch($orientation) {
	            case 8:
	                $thumb = imagerotate($thumb,90,0);
	                break;
	            case 3:
	                $thumb = imagerotate($thumb,180,0);
	                break;
	            case 6:
	                $thumb = imagerotate($thumb,-90,0);
	                break;
	        }
			
			$newSquareFileName = $folder . $filename;
			imagejpeg($thumb, $newSquareFileName, 80);
			imagedestroy($thumb);
			imagedestroy($source);
		} else if ($_FILES['uploadimage']['type'] == "image/png") {
			$thumb_width = $newWidth;
			$thumb_height = $newWidth;// tweak this for ratio
			list($width, $height) = getimagesize($file);
			$original_aspect = $width / $height;
			$thumb_aspect = $thumb_width / $thumb_height;

			if($original_aspect >= $thumb_aspect) {
			   // If image is wider than thumbnail (in aspect ratio sense)
			   $new_height = $thumb_height;
			   $new_width = $width / ($height / $thumb_height);
			} else {
			   // If the thumbnail is wider than the image
			   $new_width = $thumb_width;
			   $new_height = $height / ($width / $thumb_width);
			}

			$source = imagecreatefrompng($file);
			$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

			// Resize and crop
			imagecopyresampled($thumb,
							   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
							   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
							   0, 0,
							   $new_width, $new_height,
							   $width, $height);

	        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newHeight, $width, $height);

	        switch($orientation) {
	            case 8:
	                $thumb = imagerotate($thumb,90,0);
	                break;
	            case 3:
	                $thumb = imagerotate($thumb,180,0);
	                break;
	            case 6:
	                $thumb = imagerotate($thumb,-90,0);
	                break;
	        }
			
			$newSquareFileName = $folder . $filename;
			imagepng($thumb, $newSquareFileName, 8);
			imagedestroy($thumb);
			imagedestroy($source);
		}
	}

 ?>