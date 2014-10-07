function do_upload($path,$width = 350,$height = 350)
	{

		//upload and update the file
		$config['upload_path'] = $path;
		// $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|bmp';
		$config['overwrite'] = false;
		$config['remove_spaces'] = true;
		$config['encrypt_name'] = TRUE;
		// $config['max_size']	= '2048'; // in KB
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_multi_upload('files'))
		{
			//display_var($this->upload->display_errors());
			return FALSE;
		}	
		else
		{

			$files = $this->upload->get_multi_upload_data();
			$this->load->library('image_lib');  
			foreach ($files as $file) {
				$rotate = false;
				// $exif = exif_read_data($file['file_path'].$file['file_name'], 'IFD0');

				// if($exif!==false){
				// 	$rotate = true;
				// 	$config['rotation_angle'] = '270'; //
				// }

				//Image Resizing
				$config['source_image'] = $file['file_path'].$file['file_name'];
				$config['maintain_ratio'] = FALSE;
				$config['width'] = $width;
				$config['height'] = $height;

				$this->image_lib->clear();
				$this->image_lib->initialize($config);
		
				if ( ! $this->image_lib->resize()){
					echo $this->image_lib->display_errors();
				}

				// if ($config['max_size'] < $file['file_size']){
				// 	echo $this->image_lib->display_errors();
				// }

				if($rotate){
					if ( ! $this->image_lib->rotate()){
						echo $this->image_lib->display_errors();
					}
				}
			}
			
			return TRUE;
		}
	} 
