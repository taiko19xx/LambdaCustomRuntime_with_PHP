<?php
class Hello extends CI_Controller {
	public function index()
	{
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['hello' => 'world']));
	}
}
