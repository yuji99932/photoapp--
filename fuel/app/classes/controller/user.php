<?php

class Controller_User extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = ['index'=> 'active'];
		$this->template->title = 'User &raquo; Index';
		$this->template->content = View::forge('user/index', $data);
	}

	public function action_create()
	{
	if (Input::method() == 'POST')
	{
		$auth = Auth::instance();
		$auth->create_user(Input::post('username'), Input::post('password'), Input::post('email'));
		Response::redirect('photo/index');
	}
		$data["subnav"] = ['create'=> 'active'];
		$this->template->title = 'User &raquo; Create';
		$this->template->content = View::forge('user/create', $data);
	}

	public function action_login()
	{
		if(Input::method() == 'POST') {
			if (Auth::login(Input::post('username'), Input::post('password')))
			{
				Response::redirect('photo/index');
			}
		}
		$data["subnav"] = ['login'=> 'active'];
		$this->template->title = 'User &raquo; Login';
		$this->template->content = View::forge('user/login', $data);
	}

	public function action_logout()
	{
		Auth::logout();
		Response::redirect('user/login');
		$data["subnav"] = array('logout'=> 'active' );
	}

}
