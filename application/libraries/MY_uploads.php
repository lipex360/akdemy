<?php if(!defined("BASEPATH")){ exit("No direct script access allowed"); }
	
	class MY_Upload extends CI_Upload {
		public function mUp(array $data, array $type, $path){

			$count = count($data['name']);
			$keys = array_keys($data);

			for ($i=0; $i<$count; $i++) {
				foreach ($keys as $key) {
					$array[$i][$key] = $data[$key][$i];
				}
			}

			// CRIA DIRETÓRIO SE NÃO EXISTIR
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}

			$i = 0;
			foreach ($array as $value) {
				var_dump($value);
				$tmp = $value['tmp_name'];
				$ext = substr($value['name'], strrpos($value['name'], '.'));
				$name = substr($value['name'], 0, strrpos($value['name'], '.'));
				$unique_name = $this->limpaTexto($name)."[".substr(md5(date('Ymdhisu').$i),0,3)."]".$ext;
				$filepath = $path.$unique_name;

				$ext = str_replace(".", "", $ext);

				// CHECA SE EXTENÇÃO É ACEITA
				if(!in_array($ext, $type)){
					$error = 1;
				}

				// SEM ERROS
				else{
					$error = 0;
				}
				
				$files[$i] = array(
					"count" => $i,
					"name" => $name,
					"unique_name" => $unique_name,
					"ext" => $ext,
					"size" => ceil($value['size']/1024),
					"error" => $error
				);

				if($error == 0){
					move_uploaded_file($tmp, $filepath);
				}
				
				$i++;
			}

			return $files;
				
		}
	}
?>