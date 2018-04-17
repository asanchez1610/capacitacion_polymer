<?php

require '../libs/rb/rb.php';
require '../config/Configuracion.php';

class QueryProvider {

    private $configuration;

    public function __construct() {
        $this->configuration = new Configuracion();
        R::setup('mysql:host=' . $this->configuration->host . ';dbname=' . $this->configuration->dataBase . '', $this->configuration->user, $this->configuration->password);
        R::debug(FALSE);
    }
	
	public function listarPersona($persona = null) {
		
	   $where = ""; 	
		
	   if(!empty($persona) && !empty($persona['id'])){
		   $where.=" and p.id = ".$persona['id'];
	   }		
       
	   $sql = " SELECT
					p.*
				FROM
					persona p 
				WHERE p.estado = 'A' ".$where;
            
       $results = R::getAll($sql);
       return $results;
	   
    }
	
	public function savePersona($persona){
		
		if(empty($persona['id'])){ 
			return $this->insertPersona($persona);
		}else{
			return $this->updatePersona($persona);
		}
		
	}
	
	public function deletePersona($id){
		
		$persona = [];
		$persona['id'] = $id;
		$persona['estado'] = 'I';
		$this->updatePersona($persona);
		
	}
	
	 private function insertPersona($persona){
        
	
		
		  R::exec(" INSERT INTO persona
					(
						nombres,
						email,
						telefono,
						estado
					)
					VALUES(
						'".$persona['nombres']."', 
						'".$persona['email']."', 
						'".$persona['telefono']."', 
						'A' ) ");									   
											   
        
        $sql = "SELECT LAST_INSERT_ID()";
        $id = R::getCell($sql);
		$persona['id'] = $id;
        return $persona;
    }
	
	 private function updatePersona($persona){

		$sql = 	" UPDATE persona ";
				
		if(empty($persona)){ return null;}
		if(empty($persona['id'])){ return null;}
	 
		$sqlUpdate = [];
	 
		if(!empty($persona['nombres'])){
			$sqlUpdate[] = " nombres='".$persona['nombres']."' ";
		}
				
		if(!empty($persona['email'])){
			$sqlUpdate[] = " email='".$persona['email']."' ";
		}
		
		if(!empty($persona['telefono'])){
			$sqlUpdate[] = " telefono='".$persona['telefono']."' ";
		}
		
		if(!empty($persona['estado'])){
			$sqlUpdate[] = " estado='".$persona['estado']."' ";
		}
		
		if(count($sqlUpdate) > 0){
			$sql.="SET  ".implode(" , " , $sqlUpdate)." WHERE id = ".$persona['id'];
			R::exec($sql);	
		}

        return $persona;
    }
		
}
