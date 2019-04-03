<?php

/** @property EnseignantModel $EnseignantModel 
 *  @property Aauth  $Aauth 
 */
class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('EnseignantModel');
        $this->load->library('form_validation');
        $this->load->library('Aauth');
    }
    function verification($idAauth,$keyVerif){
        
    }
    function Create(){
        $this->load->library('form_validation');
        LoadValidationRules($this->EnseignantModel,$this->form_validation);
        $this->form_validation->set_rules('password','Password','required|max_length[100]');
        $this->form_validation->set_rules('confirmer',
                'Confirmez le mot de passe',"required|max_length[100]|callback_password_check");
        if ($this->form_validation->run()) {
            $params=array(
                'nom'=>$this->input->post('nom'),
                'prenom'=>$this->input->post('prenom'),
                'login'=>$this->input->post('login'),
                'password'=>$this->input->post('password'),
                'confirmer'=>$this->input->post('confirmer'),
                );
            $this->Aauth->create_user($params['login'], $params['password']);
            redirect('Login/Index');
        }
        else{
            $this->load->view('AppHeader');
            $this->load->view('AccountCreate');
            $this->load->view('AppFooter');
        }
    }
    function password_check(){
        $password=$this->input->post('password');
        $passwordConfirmation=$this->input->post('confirmer');
        if ($password!=$passwordConfirmation) {
            $this->form_validation->set_message('password_check',
'           le mot de passe de confirmation est différent du mot de passe initial');
            return false;
        }
        else {
            return true;
        }
    }
    function recaptcha_check($resp){
        
    }
    function edit(){
        
    }
    function attente_confirmation(){
        $data['title']="Confirmation de votre inscription";
        $data['email']=$email;
        $this->load->view('AppHeader',$data);
        $this->load->view('AccountConfirmation',$data);
        $this->load->view('AppFooter');
    }
}