<?php
class Partidas{
    private $id;
    private $id_usuario;
    private $partidaEnCurso;
    private $tableroRevelado;

	public function __constructor($id, $id_usuario, $partidaEnCurso, $tableroRevelado) {

		$this->id = $id;
		$this->id_usuario = $id_usuario;
		$this->partidaEnCurso = $partidaEnCurso;
		$this->tableroRevelado = $tableroRevelado;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($value) {
		$this->id = $value;
	}

	public function getId_usuario() {
		return $this->id_usuario;
	}

	public function setId_usuario($value) {
		$this->id_usuario = $value;
	}

	public function getPartidaEnCurso() {
		return $this->partidaEnCurso;
	}

	public function setPartidaEnCurso($value) {
		$this->partidaEnCurso = $value;
	}

	public function getTableroRevelado() {
		return $this->tableroRevelado;
	}

	public function setTableroRevelado($value) {
		$this->tableroRevelado = $value;
	}
}