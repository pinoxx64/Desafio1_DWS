<?php
class Usuario{
    private $id;
    private $nombre_usuario;
    private $admin;
    private $contrasena;
    private $correo;

	public function __constructor($id, $nombre_usuario, $admin, $contrasena, $correo) {

		$this->id = $id;
		$this->nombre_usuario = $nombre_usuario;
		$this->admin = $admin;
		$this->contrasena = $contrasena;
		$this->correo = $correo;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getNombre_usuario() {
		return $this->nombre_usuario;
	}

	public function setNombre_usuario($value) {
		$this->nombre_usuario = $value;
	}

	public function getAdmin() {
		return $this->admin;
	}

	public function setAdmin($value) {
		$this->admin = $value;
	}

	public function getContrasena() {
		return $this->contrasena;
	}

	public function setContrasena($value) {
		$this->contrasena = $value;
	}

	public function getCorreo() {
		return $this->correo;
	}

	public function setCorreo($value) {
		$this->correo = $value;
	}
}