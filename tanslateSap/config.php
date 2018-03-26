<?php 

class maestroSap{

	//declaro todas las variables a utilizar 
	private $idmun;
	private $nomun;
	private $ramo;

	//Meto las variables en el contructor
	public function __construc($idmun,$nomun, $ramo){
		$this->idMun =$idmun;
		$this->noMun =$nomun;
		$this->ramo =$ramo;
	}

	// Getters and Setters de las variables
	public function getIdmun()
	{
		return $this->idMun;

	}

	public function setIdmun($idmun)
	{
		$this->idMun = $idmun;
	
	}

	public function getNomun()
	{
	
		return $this->noMun;
	}

	public function setNomun($nomun)
	{
	
		$this->noMun = $nomun;
	}
		public function getRamo()
	{
	
		return $this->ramo;
	}

	public function setRamo($ramo)
	{
	
		$this->ramo = $ramo;
	}



	//funciones que necesito ralizar con estas variables
	public function translate($idmun,$ramo){
		
		$this->idmunicipio=$idmun;
		$this->tipoCli=$ramo;

		switch ($this->idmunicipio) {
			case "CO0001":
				$this->setIdmun("3");
				$this->setNomun("Cundinamarca");
			break;
			case "CO0002":
				$this->setIdmun("1");
				$this->setNomun("Antioquia");

			break;
			case "CO0003":
				$this->setIdmun("2");
				$this->setNomun("Boyaca");
			break;
			case "CO0004":
				$this->setIdmun("9");
				$this->setNomun("Tolima");
			break;
			case "CO0005":
				$this->setIdmun("10");
				$this->setNomun("Llanos");
			break;
			case "CO0006":
				$this->setIdmun("8");
				$this->setNomun("Santander");
			break;
			case "CO0007":
				$this->setIdmun("4");
				$this->setNomun("Eje Cafetero");
			break;
			case "CO0008":
				$this->setIdmun("6");
				$this->setNomun("Nariño");
			break;
			case "CO0009":
				$this->setIdmun("7");
				$this->setNomun("Cauca");
			break;
			case "CO0010":
				$this->setIdmun("5");
				$this->setNomun("Huila");
			break;
			case "CO0011":
				$this->setIdmun("12");
				$this->setNomun("Flores");
			break;
			/*default:
				$this->setIdmun("Estoy mostrando el Default");
			break;*/
		}

		if ($this->tipoCli=="ZD14") {
			$this->setRamo("Distribuidor");
		}
		else
		{
			$this->setRamo("Agricultor");
		}
	}


}

?>