
<?php
//master.php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}

//phort made
public function save_lesson(){
    extract($_POST);
    $data = "";
    foreach ($_POST as $k => $v) {
        if (!in_array($k, ['id', 'class_ids']) && !is_numeric($k)) {
            if (!empty($data)) $data .= ", ";
            $data .= " {$k} = '".addslashes($v)."' ";
        }
    }

    if (empty($id)) {
        $sql = "INSERT INTO lessons set {$data}";
    } else {
        $sql = "UPDATE lessons set {$data} where id = {$id}";
    }

    $save = $this->conn->query($sql);
    if ($save) {
        $lid = empty($id) ? $this->conn->insert_id : $id;

        // Save class mapping
        $this->conn->query("DELETE FROM lesson_class where lesson_id = '{$lid}'");
        foreach ($_POST['class_ids'] as $cid) {
            $this->conn->query("INSERT INTO lesson_class (lesson_id, class_id) VALUES ('{$lid}', '{$cid}')");
        }

        // Handle file uploads
        if(isset($_FILES['ppt_slide']) && count($_FILES['ppt_slide']['tmp_name']) > 0){
            $upload_path = base_app . "uploads/lessons/";
            if(!is_dir($upload_path))
                mkdir($upload_path, 0777, true);

            foreach($_FILES['ppt_slide']['tmp_name'] as $i => $tmp){
                $fname = $_FILES['ppt_slide']['name'][$i];
                $ext = pathinfo($fname, PATHINFO_EXTENSION);
                $new_name = "lesson-{$lid}-".time()."-{$i}.{$ext}";
                if(move_uploaded_file($tmp, $upload_path . $new_name)){
                    $this->conn->query("INSERT INTO lesson_files (lesson_id, file_path) VALUES ('{$lid}', '{$new_name}')");
                }
            }
        }

        return $lid;
    } else {
        return json_encode(['error' => 'DB Error', 'sql' => $sql]);
    }
}

//edn online made




	public function save_academic(){
		extract($_POST);
		
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM academic_year where sy = '$sy' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO academic_year set $data";
		}else{
			$sql = "UPDATE academic_year set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			if($status == 1){
				$id = empty($id) ? $this->conn->insert_id : $id;
				$this->conn->query("UPDATE academic_year set status = 0 where id != $id");
				$this->settings->set_userdata('academic_id',$id);
				$this->settings->set_userdata('academic_sy',$sy);
			}
			$this->settings->set_flashdata('success'," Academic Year Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
	public function delete_academic(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM academic_year where id = $id");
		if($delete)
			return 1;
	}

	public function save_department(){
		extract($_POST);
		
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM department where department = '$department' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO department set $data";
		}else{
			$sql = "UPDATE department set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Department Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
	public function delete_department(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM department where id = $id");
		if($delete)
			return 1;
	}
	
	public function save_course(){
		extract($_POST);
		
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM course where course = '$course' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return "SELECT * FROM course ".((!empty($id))? " where id != {$id}" : ''); 
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO course set $data";
		}else{
			$sql = "UPDATE course set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Course Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
	public function delete_course(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM course where id = $id");
		if($delete)
			return 1;
	}

	public function save_subject(){
		extract($_POST);
		
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM subjects where subject_code = '$subject_code' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}

		if(empty($id)){
			$sql = "INSERT INTO subjects set $data";
		}else{
			$sql = "UPDATE subjects set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Subject Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
	public function delete_subject(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM subjects where id = $id");
		if($delete)
			return 1;
	}
	public function save_student(){
		extract($_POST);
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM students where student_id = '$student_id' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}

		if(empty($id)){
			$data .= ", `password` = '".md5($student_id)."' ";
			$sql = "INSERT INTO students set $data";
		}else{
			if(isset($preset) && $preset == 'on')
			$data .= ", `password` = '".md5($student_id)."' ";
			$sql = "UPDATE students set $data where id = $id";
		}

		$save = $this->conn->query($sql);
		if($save){
			if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
					$ext = explode('.', $_FILES['img']['name']);
					$fname = 'uploads/uvatar_'.$id.'.'.$ext[1];
					if(is_file('../'.$fname))
						unlink('../'.$fname);
					$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
					if($move){
						$this->conn->query("UPDATE students set avatar = '$fname' where id = $id ");
					}
			}
			$this->settings->set_flashdata('success'," Subject Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}

	}

	public function delete_student(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM students where id = $id");
		if($delete)
			return 1;
	}
	public function save_class(){
		extract($_POST);
		
		$data="";
		$data2="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
				if(!empty($data2)) $data2 .= "and ";
				$data2 .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM class where $data2 ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}

		if(empty($id)){
			$sql = "INSERT INTO class set $data";
		}else{
			$sql = "UPDATE class set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Class Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
	public function delete_class(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM class where id = $id");
		if($delete)
			return 1;
	}
	public function student_class(){
		extract($_POST);

		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}

		if(empty($id)){
			$sql = "INSERT INTO student_class set $data";
		}else{
			$sql = "UPDATE student_class set $data where id = $id";
		}

		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Student's Class Successfully updated.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}

	}
	public function load_class_subject(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM class_subjects where class_id = '$class_id' and academic_year_id = '$academic_year_id' ");
		$data = "";
		foreach ($subject_id as $key => $valuu) {
			if(!empty($data)) $data .= ", ";
			$data .= " ('$class_id','$academic_year_id','{$subject_id[$key]}') ";
		}
		$sql = "INSERT INTO class_subjects (class_id,academic_year_id,subject_id) VALUES $data ";
		// echo $sql;exit;
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Class Subject Loads Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}

	public function save_faculty(){
		extract($_POST);
		$data="";
		foreach ($_POST as $key => $value) {
			if(!in_array($key, array('id')) && !is_numeric($key)){
				if(!empty($data)) $data .= ", ";
				$data .= " {$key} = '{$value}' ";
			}
		}
		$chk = $this->conn->query("SELECT * FROM faculty where faculty_id = '$faculty_id' ".((!empty($id))? " and id != {$id}" : ''));
		if($chk->num_rows > 0){
			return 2; 
			exit;
		}

		if(empty($id)){
			$data .= ", `password` = '".md5($faculty_id)."' ";
			$sql = "INSERT INTO faculty set $data";
		}else{
			if(isset($preset) && $preset == 'on')
			$data .= ", `password` = '".md5($faculty_id)."' ";
			$sql = "UPDATE faculty set $data where id = $id";
			$ofid = $this->conn->query("SELECT * FROM faculty where id = $id ")->fetch_array()['faculty_id'];
		}

		$save = $this->conn->query($sql);
		if($save){
			$id= empty($id) ? $this->conn->insert_id : $id;
			if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
					$ext = explode('.', $_FILES['img']['name']);
					$fname = 'uploads/Favatar_'.$id.'.'.$ext[1];
					if(is_file('../'.$fname))
						unlink('../'.$fname);
					$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
					if($move){
						$this->conn->query("UPDATE faculty set avatar = '$fname' where id = $id ");
					}
			}
			if(isset($ofid)){
				$this->conn->query("UPDATE class_subjects_faculty set faculty_id = '$faculty_id' where faculty_id = $ofid ");
				$this->conn->query("UPDATE lessons set faculty_id = '$faculty_id' where faculty_id = $ofid ");

			}
			$this->settings->set_flashdata('success'," Subject Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}

	}

	public function delete_faculty(){
		extract($_POST);

		$delete = $this->conn->query("DELETE FROM faculty where id = $id");
		if($delete)
			return 1;
	}
	public function load_faculty_subj(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM class_subjects_faculty where faculty_id = '$faculty_id' and academic_year_id = '$academic_year_id' ");
		$data = "";
		foreach ($class_subj as $key => $valuu) {
			$ex = explode("_", $class_subj[$key]);
			$class_id = $ex[0];
			$subject_id = $ex[1];
			if(!empty($data)) $data .= ", ";
			$data .= " ('$academic_year_id','$faculty_id','$class_id','$subject_id') ";
		}
		$sql = "INSERT INTO class_subjects_faculty (academic_year_id,faculty_id,class_id,subject_id) VALUES $data ";
		// echo $sql;exit;
		$save = $this->conn->query($sql);
		if($save){
			$this->settings->set_flashdata('success'," Faculty Class Loads Successfully saved.");
			return 1;
		}else{
			$resp['err']= "error saving data";
			$resp['sql']=$sql;
			return json_encode($resp);
		}
	}
   /*
	public function save_lesson(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k, array('id','class_ids'))){
				if(!empty($data)) $data .= ", ";
				if($k == 'description') $v = addslashes(htmlentities($v));
				$data .= " `{$k}` = '{$v}' ";
			}
		}

		if(empty($id)){
			$sql = "INSERT INTO lessons set $data";
		}else{
			$sql = "UPDATE lessons set $data where id = $id";
		}
		$save = $this->conn->query($sql);
		if($save){
			$id = (empty($id)) ? $this->conn->insert_id : $id;
			$data="";
			foreach ($class_ids as $key => $value) {
				$this->conn->query("DELETE lesson_class where lesson_id = $id");
				if(!empty($data)) $data .= ", ";
				$data .= " ('$id','{$class_ids[$key]}') ";
			}
			$sql2 = $this->conn->query("INSERT INTO lesson_class (lesson_id,class_id) values $data");
			if(isset($_FILES['ppt_slide']) && count($_FILES['ppt_slide']) > 0){
				if(!is_dir('../uploads/slides')){
					mkdir('../uploads/slides');
				}
				if(!is_dir('../uploads/slides/lesson_'.$id)){
					mkdir('../uploads/slides/lesson_'.$id);
				}else{
					$files = scandir('../uploads/slides/lesson_'.$id);
					foreach ($files as $key => $value) {
						if(!in_array($files[$key],array('.','..')) && !empty($_FILES['ppt_slide']['tmp_name'][0])){
							unlink('../uploads/slides/lesson_'.$id.'/'.$files[$key]);
						}
					}
				}

				$path = 'uploads/slides/lesson_'.$id;
				$this->conn->query("UPDATE lessons set ppt_path = '{$path}' where id = '$id' ");
				$path = '../'.$path;
				foreach ($_FILES['ppt_slide']['tmp_name'] as $k => $value) {
					if(isset($_FILES['ppt_slide']['tmp_name'][$k]) && !empty($_FILES['ppt_slide']['tmp_name'][$k])){
						$move = move_uploaded_file($_FILES['ppt_slide']['tmp_name'][$k], $path.'/'.$_FILES['ppt_slide']['name'][$k]);
					}
				}
			}
			
			$this->settings->set_flashdata('success'," Lesson Successfully saved.");
			return $id;
		}else{
			$resp['sql1'] = $sql;
			$resp['sql2'] = $sql2;
			return json_encode($resp);
		}
	} */
	function upload_files(){
		$dir = 'uploads/media/'.$this->settings->userdata('id');
		if(!is_dir(base_app.$dir)){
			mkdir(base_app.$dir);
		}
		$regEx = "/^application\/pdf$|^image\/|^video\//";
		$data = "";
		foreach($_FILES['files']['tmp_name'] as $k =>$v){
			if(is_uploaded_file($_FILES['files']['tmp_name'][$k])){
				if(preg_match($regEx,mime_content_type($_FILES['files']['tmp_name'][$k]),$match)){
					$fname = $_FILES['files']['name'][$k];
					$i=1;
					while(true){
						$i++;
						if(is_file(base_app.$dir.'/'.$fname)){
							$fname = str_replace(".",'_'.$i.'.',$fname);
						}else{
							break;
						}
					}
					$path = $dir.'/'.$fname;
					$move = move_uploaded_file($_FILES['files']['tmp_name'][$k],base_app.$path);
					if($move){
						$this->conn->query("INSERT INTO `upload_files` (`faculty_id`,`filename`,`file_path`) VALUES ('{$this->settings->userdata('id')}','{$fname}','{$path}') ");
					}
				}else{
					$resp['status'] = 'failed';
					$resp['msg'] = "Invalid Upload File Type.";	
				}
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "Uploaded file is invalid.";
			}
		}
		$resp['status']='success';
		if($_POST['reload']){
			$this->settings->set_flashdata("success"," File successfully uploaded");
		}
		return json_encode($resp);		
	}
	function save_to_backpack(){
		extract($_POST);
		$uf_qry = $this->conn->query("SELECT id FROM `upload_files` where `file_path` = '{$file_path}' ");
		$file_upload_id = ($uf_qry->num_rows > 0) ? $uf_qry->fetch_array()['id'] : '';
		if(empty($file_upload_id)){
			$resp['status'] = 'failed';
			$resp['msg'] = "Unknown source of file.";
		}else{
			$check = $this->conn->query("SELECT * FROM `backpack` where `student_id` = '{$this->settings->userdata('id')}' and `upload_file_id` = '{$file_upload_id}' and `lesson_id` = '{$lesson_id}' ")->num_rows;
			if($check > 0){
				$resp['status']="failed";
				$resp['msg']= "File already saved in backpack under this lesson.";
			}else{
				$data = "";
				foreach($_POST as $k => $v){
					if(in_array($k,array('file_path')))
					continue;
					if(!empty($data)) $data .= ",";
					$data .= " `{$k}` = '{$v}' ";
				}
					$data .= ", `upload_file_id` = '{$file_upload_id}' ";
					$data .= ", `student_id` = '{$this->settings->userdata('id')}' ";
					if(!isset($pinned)){
						$data .= ", `pinned` = '0' ";
					}
				$sql = "INSERT INTO `backpack` set {$data}";
				$save = $this->conn->query($sql);
				if($save){
					$resp['status'] = 'success';
				}else{
					$resp['status'] = 'failed';
					$resp['error'] =  $this->conn->error;
					$resp['msg'] = 'Saving data failed.';
				}
			}
			
		}
		return json_encode($resp);
	}
	function pin_bp_item(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `backpack` set `pinned` ={$pinned} where id = '{$id}' ");
		if($update){
			$resp['status'] = 'success';
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function remove_from_backpack(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM `backpack` where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Backpack Item successfully deleted");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_lesson(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM `lessons` where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Lesson successfully deleted");
			if(is_dir(base_app.'uploads/slides/lesson_'.$id)){
				$path = base_app.'uploads/slides/lesson_'.$id;
				$files = scandir($path);
				foreach($files as $file){
					if(in_array($file,array('.','..'))) continue;
					if(is_file($path.'/'.$file))
						unlink($path.'/'.$file);
				}
				rmdir($path);
			}

		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_media(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM `upload_files` where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," File successfully deleted");
			if(is_file(base_app.$path))
				unlink((base_app.$path));
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_academic':
		echo $Master->save_academic();
	break;
	case 'delete_academic':
		echo $Master->delete_academic();
	break;
	case 'save_department':
		echo $Master->save_department();
	break;
	case 'delete_department':
		echo $Master->delete_department();
	break;

	case 'save_course':
		echo $Master->save_course();
	break;
	case 'delete_course':
		echo $Master->delete_course();
	break;

	case 'save_subject':
		echo $Master->save_subject();
	break;
	case 'delete_subject':
		echo $Master->delete_subject();
	break;
	case 'save_student':
		echo $Master->save_student();
	break;
	case 'delete_student':
		echo $Master->delete_student();
	break;
	case 'save_class':
		echo $Master->save_class();
	break;
	case 'delete_class':
		echo $Master->delete_class();
	break;
	case 'student_class':
		echo $Master->student_class();
	break;	
	case 'load_class_subject':
		echo $Master->load_class_subject();
	break;		
	case 'save_faculty':
		echo $Master->save_faculty();
	break;
	case 'delete_faculty':
		echo $Master->delete_faculty();
	break;
	case 'faculty_class':
		echo $Master->load_faculty_subj();
	break;	
	case 'save_lesson':
		echo $Master->save_lesson();
	break;
	case 'upload_files':
		echo $Master->upload_files();
	break;
	case 'save_to_backpack':
		echo $Master->save_to_backpack();
	break;
	case 'pin_bp_item':
		echo $Master->pin_bp_item();
	break;
	case 'remove_from_backpack':
		echo $Master->remove_from_backpack();
	break;
	case 'delete_lesson':
		echo $Master->delete_lesson();
	break;
	case 'delete_media':
		echo $Master->delete_media();
	break;
	default:
		// echo $sysset->index();
		break;
}



