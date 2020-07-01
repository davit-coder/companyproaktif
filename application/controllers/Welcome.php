<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
		parent::__construct();
		$url = $this->input->get('musikproaktif.com');
		$this->db->set('id_pengunjung', $url);
		$this->db->insert('total');
	}
	public function index()
	{
		$this->load->view('home');
	}

	public function view_news ()
	{
		$this->load->view('view_news');
	}
	

	public function balik ()
	{

		if (isset($_POST)) {
			$post = $this->input->post('ahref');
			$dt['post'] = $post;
			$this->load->view('home',$dt);
		}
		else
		{
			$this->load->view('home');
		}

		// $this->load->view('home');
		
	}

	public function view_cata ()
	{
		$this->load->view('cata');
	}

	public function tfive ()
	{
		$this->load->view('tfive');
	}

	public function amor ()
	{
		$this->load->view('amor');
	}

	public function bandadista ()
	{
		$this->load->view('bandadista');
	}

	public function dmojang ()
	{
		$this->load->view('dmojang');
	}

	public function elvira ()
	{
		$this->load->view('elvira');
	}

	public function lsista ()
	{
		$this->load->view('lsista');
	}

	public function triomacan ()
	{
		$this->load->view('triomacan');
	}

	public function informasi()
	{
		$result="";
		require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';
		// include_once APPPATH.'vendor/autoload.php';
		if (isset($_POST['submit'])) {
		  
		  $mail = new PHPmailer;

		  $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		  $mail->isSMTP();                                      // Set mailer to use SMTP
		  $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
		  $mail->SMTPAuth = true;                               // Enable SMTP authentication
		  $mail->Username = 'webcsnotreplay@gmail.com';                 // SMTP username
		  $mail->Password = '02feb1990';                           // SMTP password
		  $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		  $mail->Port = 465;    
		  $mail->IsHTML(false);
		  $mail->SMTPAuth=true;
		  

		  $mail->setFrom($_POST['email'],$_POST['name']);
		  $mail->addAddress('proaktifdigital@gmail.com');
		  $mail->addReplyTo($_POST['email'],$_POST['name']);

		  $mail->isHTML(true);
		  // $mail->Subject='Form Submission:'.$_POST['subject'];
		  $mail->Subject='Form Submission: Hallo Team Proaktif';
		  $mail->Body='<h1 align=center>Name : '.$_POST['name'].'<br>Email : '.$_POST['email'].'<br>No Telpon : '.$_POST['phone'].'<br>Message: '.$_POST['message'].'</h1>';

		  if (!$mail->send()) {
		    $result="Something went wrong. Please try again.";
		   // $result = $mail->ErrorInfo;
		  }
		  else{
		    $result="<h1 align=center>Thanks \t".$_POST['name']."\tfor contacting us. We'll get back to you soon!</h1>
		    <center><a href=http://localhost/cpmusik/ >&larr; Back to Media Musik Proaktif</a></center>";
		    print_r($result);
		  }
		  
		  
		  
		}
	}

	

}
