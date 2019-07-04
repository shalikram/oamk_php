<?php
class Question extends CI_Controller{

  function __construct() {
		parent::__construct();
		$this->load->model(question);
	}

  public function index() {

      if ($this->session->userdata('user_id'))
          redirect(base_url('dashboard'));
      $this->load->helper('form');
      $this->load->view('admin_login');
      $this->load->library('form_validation');


//validating question_id field
 if ($this->input->post('geography'))

 $i=$this->input->post('question_id');
 $q=$this->input->post('question');
 $c1=$this->input->post('choice1');
 $c2=$this->input->post('choice2');
 $c3=$this->input->post('choice3');
 $a=$this->input->post('answer');

 $que=$this->db->query("select * from geography where question_id='".$i."'");
 $row = $que->num_rows();
if($row)
{
$data['error']="<h3 style='color:red'>This question already exists</h3>";
}
else
{
$que=$this->db->query("insert into student values('','$i','$q','$c1','$c2','$c3','$a')");
$data['error']="<h3 style='color:blue'>Your question created successfully</h3>";
}
}
$this->load->view('admin/question.php',@$data);
}

function dashboard()
{
$this->load->view('dashboard');
}
}
?>
  ?>
