<?php
class Controller_Photo extends Controller_Template
{

	public function action_index()
	{
		$data['photos'] = Model_Photo::find('all');
		$name = Auth::get_screen_name();
		$this->template->title = "Photos";
		$this->template->content = View::forge('photo/index', $data);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('photo');

		if ( ! $data['photo'] = Model_Photo::find($id))
		{
			$date = 'created_at';
			Session::set_flash('error', 'Could not find photo #'.$id);
			Response::redirect('photo');	
		}

		$this->template->title = "Photo";
		$this->template->content = View::forge('photo/view', $data);

	}

	public function action_create()
	{
		if(!Auth::check())
		{
			Response::redirect('user/login');
		}

		if (Input::method() == 'POST')
		{
			$val = Model_Photo::validate('create');

			if ($val->run())
			{
				$value = Auth::get('id');

				$photo = Model_Photo::forge(array(
					'place' => Input::post('place'),
					'comment' => Input::post('comment'),
					'user_id' => $value,
				));

				if ($photo and $photo->save())
				{
					Session::set_flash('success', 'Added photo #'.$photo->id.'.');
					$upload = Model_Upload::forge(array(
						'place' => Input::post('place'),
						'comment' => Input::post('comment'),
					));

					Response::redirect('photo');
				}

				else
				{
					Session::set_flash('error', 'Could not save photo.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Photos";
		$this->template->content = View::forge('photo/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('photo');

		$value = Model_Photo::find($id);
		if ($value->user_id != Auth::get('id')) {
			Response::redirect('photo');
		}

		if ( ! $photo = Model_Photo::find($id))
		{
			Session::set_flash('error', 'Could not find photo #'.$id);
			Response::redirect('photo');
		}

		$val = Model_Photo::validate('edit');

		if ($val->run())
		{
			$photo->place = Input::post('place');
			$photo->comment = Input::post('comment');

			if ($photo->save())
			{
				Session::set_flash('success', 'Updated photo #' . $id);

				Response::redirect('photo');
			}

			else
			{
				Session::set_flash('error', 'Could not update photo #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$photo->place = $val->validated('place');
				$photo->comment = $val->validated('comment');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('photo', $photo, false);
		}

		$this->template->title = "Photos";
		$this->template->content = View::forge('photo/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('photo');

		$value = Model_Photo::find($id);
		if ($value->user_id != Auth::get('id')) {
			Response::redirect('photo');
		}

		if ($photo = Model_Photo::find($id))
		{
			$photo->delete();

			Session::set_flash('success', 'Deleted photo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete photo #'.$id);
		}

		Response::redirect('photo');
	
	}

}
