<?php
	class noticiasVO 
	{
		public $id;
		public $Titulo;
		public $Copete;
		public $Cuerpo;

		public function setId($pId)
		{
			$this->id = $pId;
		}

		public function getId()
		{
			return $this->id;
		}

		public function setTitulo($pTitulo)
		{
			$this->Titulo = $pTitulo;
		}
		public function getTitulo()
		{
			return $this->Titulo;
		}

		public function setCopete($pCopete)
		{
			$this->Copete = $pCopete;
		}
		public function getCopete()
		{
			return $this->Copete;
		}

		public function setCuerpo($pCuerpo)
		{
			$this->Cuerpo = $pCuerpo;
		}
		public function getCuerpo()
		{
			return $this->Cuerpo;
		}
	}
?>