<?php
class PKGi {
	protected $homebrews;
	protected $maxPerPage = 5;
	protected $userAgentRequired = false;
	
	protected function prepare() : array {
		$total = count($this->homebrews);
		$pages = ceil($total / $this->maxPerPage);
		
		$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
			'options' => array(
				'default'   => 1,
				'min_range' => 1,
			),
		)));
		
		$offset = ($page - 1)  * $this->maxPerPage;
		$homebrews = array_slice($this->homebrews, $offset, $this->maxPerPage);
		
		return [
			'total' => $total,
			'page' => $page,
			'line' => $this->maxPerPage,
			'packages' => $homebrews
		];
	}
	
	public function addHomebrew($name, $downloadid) : array {
		$homebrewCount = is_array($this->homebrews) ? count($this->homebrews) : 0;
		
		return $this->homebrews[] = [
			'id' => $homebrewCount + 1,
			'name' => $name,
			'download' => $downloadid
		];
	}
	
	public function render() : void {
		die(json_encode($this->prepare()));
	}
	
	public function isRequestFromHomebrew() : bool {
		if(!$this->userAgentRequired) {
			return true;
		}
		
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'PKGi') !== false) {
			return true;
		}
		
		return false;
	}
}
