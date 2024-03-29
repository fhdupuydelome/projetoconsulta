<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medicos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Medicos_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['title'] = 'Medicos Home';
        $this->load->view('templates/header', $data);
        //$this->load->view('cadastro_medico', $data);
        $this->load->view('templates/js');
        $this->load->view('templates/footer');
        
    }
    
    public function cadastrarMedico()
    {
        $this->load->library('form_validation');

        $data['title'] = "Cadastro de Medico";

        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('crm', 'CRM', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('cadastro_medico', $data);
            $this->load->view('templates/js');
            $this->load->view('templates/footer');
        } else {
            $data['caminho'] = 'medicos/cadastrarMedico';
            $this->Medicos_model->inserir();
            $this->load->view('templates/header', $data);
            $this->load->view('sucesso_cadastro', $data);
            $this->load->view('templates/js');
            $this->load->view('templates/footer');
        }
    }
}
