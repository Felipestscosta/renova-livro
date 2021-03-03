<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentica extends CI_Controller {

    // LOGIN DO ADMINISTRADOR
    public function login()
    {
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $usuario = $this->Acoes->findByEmail('administradores',$email);
        if($usuario){
            if(password_verify($senha, $usuario->senha)){
                foreach($usuario as $chave => $valor){
                    $sessao_adm[$chave] = $valor;
                }
                $this->session->set_userdata(['adm_session' => $sessao_adm]);
                echo TRUE;
            }else{
                echo 'senha_invalida';
            }
        }else{
            echo 'usuario_inexistente';
        }
    }

    public function logout(){
        $this->session->unset_userdata('adm_session');
        redirect('adm');
    }

    public function logoutUsuario(){
        $this->session->unset_userdata('usuario_session');
        redirect('');
    }


}
