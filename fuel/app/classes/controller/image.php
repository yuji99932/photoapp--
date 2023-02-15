<?php
class Controller_Image extends Controller_Template
{

// public function action_upload()
// 	{
    // // 設定（ファイル保存場所）
    // $config = array(
		// 	'path' => DOCROOT . 'uploads/',
    // );
 
    // // ユーザIDを取得
    // // list(, $userid) = Auth::get_user_id();
 
    // // アップロード実行
    // Upload::process($config);
 
    // // 検証
    // if (Upload::is_valid())
    // {
 
		// 	// アップロードファイルを保存
		// 	Upload::save();

		// 	// データベース保存
		// 	foreach (Upload::get_files() as $file)
		// 	{
		// 		// 成功したファイルの処理
		// 		// データをセット
		// 		$image = Model_Image::forge(array(
		// 			// 't_photo_users_id' => $userid, // 現在ログインしているユーザーのIDをセット
		// 			'file_name' => $file['saved_as'],
		// 			// 't_photo_type' => $file['type'],
		// 			// 't_photo_size' => $file['size'],
		// 			// 't_photo_mimetype' => $file['mimetype'],
		// 			'file_path' => $file['saved_to'],
		// 			// 't_photo_published' => '1',
		// 			'updated_at' => 0,
		// 		));

		// 		if ($image->save()) // 保存
		// 		{
		// 			// 登録成功
		// 			Session::set_flash('success', e('画像をアップロードしました。'));
		// 		}
		// 		else
		// 		{
		// 			Session::set_flash('error', '画像をアップロードできませんでした。');
		// 		}
		// 	}
    // }
 
    // // エラー有り
    // foreach (Upload::get_errors() as $file)
    // {
		// 	$html_error = '';
		// 	foreach ($file['errors'] as $error) {
		// 			$html_error .= '<p>'. $error['message'] . '</p>';
		// 	}

		// 	$this->template->title = '画像をアップロードできませんでした。';
		// 	$this->template->content = View::forge('photo/add');
		// 	$this->template->content->set_safe('html_error', $html_error);
		// 	return;
    // }
 
    //   $this->template->title = '画像ライブラリ';
    //   $this->template->content = View::forge('photo/index');
		// }
public function action_upload($id = null)
{
    $config = array(
        'path' => 'files',
        'file_name' => $file_name,
        'ext_whitelist' => array('jpg', 'jpeg', 'png'),
    );
    Upload::process($config);

    if (Upload::is_valid())
    {
        Upload::save();
        $file = Upload::get_files(0);

        Session::set_flash('success', $file['name']." has been uploaded successfully.");
    }
    else
    {
        $error_file = Upload::get_errors(0);
        Session::set_flash('error', $error_file["errors"][0]["message"]);
    }
}

// public function action_save() {
// 	$image = Model_Image::forge();

// 	$data = array();
// 	$data['file_name'] = Input::post('file_name');
// 	$data['file_path'] = Input::post('file_path');
// 	$image->set($data);
// 	$image->save();

// 	print('saved');
// }

}