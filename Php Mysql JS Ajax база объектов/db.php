<?php
class Database {
	private $link;


	public function __construct() {
		$this->connect();
	}

	protected function connect() {
		$config = require_once 'config.php';
		$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db'].';';
		$this->link = new PDO($dsn, $config['user_name'], $config['password']);
		return $this;
	}

	public function execute($sql, ...$params) {
		$sth = $this->link->prepare($sql);
		return $sth->execute(...$params);
	}

	public function query($sql, ...$params) {
		$sth = $this->link->prepare($sql);
		$sth->execute(...$params);
		$result = $sth->fetchAll(PDO::FETCH_OBJ);
		if($result === false) {
			return [];
		}
		return $result;
	}
}