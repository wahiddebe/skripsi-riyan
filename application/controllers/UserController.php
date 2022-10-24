<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class UserController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function showLogin()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$this->cekRole($this->session->userdata['role']);
		} else {
			$this->load->view('login');
		}
	}

	public function showUbahPassword()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$this->load->view('UbahPasswordView');
		} else {
			redirect('login');
		}
	}

	public function login()
	{
		if ($this->input->post('username') != "" && $this->input->post('password') != "") {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			//ambil data user
			$user = $this->User->login($data);

			if ($user != null) {
				$this->session->set_userdata('logged_in', true);
				$this->session->set_userdata('username', $this->input->post('username'));
				$this->session->set_userdata('role', $user->Role);

				$this->cekRole($user->Role);
			} else {
				$response['isSuccess'] = false;
				$this->load->view('login', $response);
			}
		}
	}

	public function ubahPassword()
	{
		$data = [];

		if (
			$this->input->post('passwordLama') != ""
			&& $this->input->post('passwordBaru') != ""
			&& $this->input->post('passwordBaru2') != ""
		) {
			if ($this->input->post('passwordBaru') != $this->input->post('passwordBaru2')) {
				$data['message'] = 'Password baru dan password konfirmasi harus sama!';
				$data['success'] = false;
				$this->load->view('ubahPasswordView', $data);
			} else {
				$data = array(
					'username' => $this->session->userdata['username'],
					'password' => $this->input->post('passwordLama')
				);

				//ambil data user
				$user = $this->User->login($data);

				if ($user != null) {
					$user->Password = $this->input->post('passwordBaru');
					$this->User->update($user->Username, $user);

					$data['success'] = true;
					$this->load->view('ubahPasswordView', $data);
				} else {
					$data['message'] = 'Password lama yang dimasukkan salah!';
					$data['success'] = false;
					$this->load->view('ubahPasswordView', $data);
				}
			}
		} else {
			$data['message'] = 'Inputan tidak boleh ada yang kosong!';
			$data['success'] = false;
			$this->load->view('ubahPasswordView', $data);
		}
	}

	public function logout()
	{
		//remove session data
		$this->session->sess_destroy();

		redirect('login');
	}

	public function getUser($page, $size)
	{
		if ($page > 0 && $size > 0) {
			$response = array(
				'content' => $this->User->getUser(($page - 1) * $size, $size)->result(),
				'totalPages' => ceil($this->User->getCountUser() / $size)
			);
		} else {
			$response = array(
				'message' => 'Parameter Tidak Boleh Kurang Dari 1'
			);
		}


		$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	private function cekRole($role)
	{
		if ($role == 'mahasiswa') {
			redirect('mahasiswa');
		} else if ($role == 'admin') {
			redirect('admin/tugasAkhir/nonApprove');
		} else if ($role == 'adminKP') {
			redirect('adminKP/KP/nonApprove');
		} else if ($role == 'adminMagang') {
			redirect('adminMagang/Magang/nonApprove');
		} else if ($role == 'TU') {
			redirect('TU');
		} else if ($role == 'dosen') {
			redirect('Dosen/Home');
		}
	}

	function import()
	{
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$Nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$NIM = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$TanggalLahir = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$Role = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$data[] = array(
						'Username'  => $NIM,
						'Password'   => $TanggalLahir,
						'Role'    => $Role
					);
					//buat akun mahasiswa

				}
			}
			$this->User->import($data);
			echo 'Data Imported successfully';
		}
	}
}
