<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    //Página de Login
    public function index()
    {
        $this->load->view('adm/header'); // CABEÇALHO
        $this->load->view('adm/login');
        $this->load->view('adm/footer'); // RODAPÉ
    }

    //Página Inicial do Painel de Controle
    public function home()
    {
        if($this->session->has_userdata('adm_session'))
        {
            $dados['usuarios'] = $this->Acoes->findAll('usuarios','nome'); //Busca Usuários
            $dados['livros'] = $this->Acoes->findWithJoin('livros', 'usuarios', 'usuario_livro'); //Busca Livros
            $dados['categorias'] = $this->Acoes->findAll('categorias');//Busca Categorias
            $dados['newsletter'] = $this->Acoes->findAll('newsletter');

            $this->load->view('adm/header'); // CABEÇALHO
            $this->load->view('adm/home', $dados);
            $this->load->view('adm/footer'); // RODAPÉ
        }else{
            $this->session->set_flashdata('erro', 'Você precisa estar logado !');
            redirect('adm');
        }
    }

    //********************************
    // PARTE DOS USUÁRIOS
    //********************************
    // View Novo Cadastro de Usuário
    public function viewNovoUsuario()
    {
        $this->load->view('adm/modal/novo_usuario');
    }

    //Ação que Cria Novo Usuário
    public function acaoNovoUsuario()
    {
        $email = $this->input->post('email');
        $retorno = $this->output->get_output($this->Acoes->save('usuarios', $email));
        @$retorno = json_decode($retorno)->return;
        if($retorno == 'existe'){
            $this->session->set_flashdata('erro', 'Desculpe. Este e-mail já está cadastrado!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('sucesso', 'Novo Usuário adicionado com sucesso');
            redirect('administrador/home');
        }
    }

    //View Edita Usuário Por Id
    public function viewEditaUsuario($id)
    {
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('adm/modal/edita_usuario', $dados);
    }

    //Ação que Cria Novo Usuário
    public function acaoEditaUsuario()
    {
        $id = $this->input->post('id');
        if($this->Acoes->update('usuarios', $id)){
            $this->session->set_flashdata('sucesso', 'As informações do usuário foram modificadas com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //Deleta Usuário Por Id
    public function deletaUsuario($id)
    {
          if( $this->Acoes->delete('usuarios', $id)){
              $this->session->set_flashdata('sucesso', 'O usuário foi deletado com Sucesso!');
              redirect('administrador/home');
          }else{
              $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
              redirect('administrador/home');
          }
    }

    //********************************
    // PARTE DOS LIVROS
    //********************************
    //EXIBE A VIEW QUE EDITA O LIVRO
    public function viewEditaLivro($id)
    {
        $dados['livro'] = $this->Acoes->findByIdWithJoin('livros', $id, 'categorias', 'categoria', 'id');
        $dados['categorias'] = $this->Acoes->findAll('categorias');
        $this->load->view('adm/modal/edita_livro', $dados);
    }

     //EDITA LIVRO
    public function acaoEditaLivro()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        if($this->Acoes->update('livros', $id)){
            $this->session->set_flashdata('sucesso', 'Informações do Livro alterado com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //DELETA LIVRO
    public function deletaLivro($id)
    {
        if( $this->Acoes->delete('livros', $id)){
            $this->session->set_flashdata('sucesso', 'Livro deletado com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //********************************
    // PARTE DAS CATEGORIAS
    //********************************

    // View Nova Categoria
    public function viewNovaCategoria()
    {
        $this->load->view('adm/modal/nova_categoria');
    }

    //EDITA A CATEGORIA
    public function acaoNovaCategoria()
    {
        if($this->Acoes->save('categorias')){
            $this->session->set_flashdata('sucesso', 'Nova categoria adicionada com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //EXIBE A VIEW QUE EDITA A CATEGORIA
    public function viewEditaCategoria($id)
    {
        $dados['categoria'] = $this->Acoes->findById('categorias', $id);
        $this->load->view('adm/modal/edita_categoria', $dados);
    }

    //EDITA A CATEGORIA
    public function acaoEditaCategoria()
    {
        $id = $this->input->post('id');
        if($this->Acoes->update('categorias', $id)){
            $this->session->set_flashdata('sucesso', 'Informações da categoria alteradas com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //DELETA CATEGORIA
    public function deletaCategoria($id)
    {
        if( $this->Acoes->delete('categorias', $id)){
            $this->session->set_flashdata('sucesso', 'Categoria deletado com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //DELETA EMAIL NEWSLETTER
    public function deletEmail($id){
        if( $this->Acoes->delete('newsletter', $id)){
            $this->session->set_flashdata('sucesso', 'Email deletado com Sucesso!');
            redirect('administrador/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador');
            redirect('administrador/home');
        }
    }

    //Recupera Senha Administrador
    public function recuperaSenhaAdm()
    {
        $this->output->set_content_type('application/json');
        $email = $this->input->post('email');
        if($this->consulta('administradores',$email)){
            if($this->Acoes->atualizaSenhaAdm($email)){
                echo  true;
            }else{
                echo  false;
            }
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('return' => 'nao_existe')));
        }
    }

    public function consulta($tabela, $dado)
    {
        $dado = urldecode($dado);
        if($this->Acoes->findByEmail($tabela,$dado)){
            return $this->Acoes->findByEmail($tabela,$dado);
        }else{
            return false;
        }
    }
}