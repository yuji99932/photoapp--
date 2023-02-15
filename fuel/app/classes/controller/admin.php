<?php

class Controller_Admin extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Admin &raquo; Index';
		$this->template->content = View::forge('admin/index', $data);
	}

	public function action_view()
	{
		$data["subnav"] = array('view'=> 'active' );
		$this->template->title = 'Admin &raquo; View';
		$this->template->content = View::forge('admin/view', $data);
	}

}
