<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    //Página Inicial do Site
    public function index()
    {
        //Início da páginação
        $total_livros = count($this->Acoes->findAll('livros'));
        $config['base_url'] = base_url('site/index/');
        $config['total_rows'] = $total_livros;
        $config['per_page'] = 12;

        //custimizacao primeiro link
        $config['first_tag_open'] = '<li> ';
        $config['first_link'] = '<span aria-hidden="true"><i class="fa fa-angle-left"></i></span><small class="page-lable">Primero</small>';
        $config['first_tag_close'] = '</li>';

        //Customizacao link voltar paginacao
        $config['prev_tag_open'] = '<li>';
        $config['prev_link'] = '<i class="fa fa-chevron-left"></i>';
        $config['prev_tag_close'] = '</li>';

        //Customização números de paginacao
        $config['num_tag_open'] = ' <li>';
        $config['num_tag_close'] = '</li>';

        //Customizacao pagina ativa
        $config['cur_tag_open'] = ' <li><a class="active" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        //Customizacao link proximo paginacao
        $config['next_tag_open'] = '<li>';
        $config['next_link'] = '<i class="fa fa-chevron-right"></i>';
        $config['next_tag_close'] = '</li>';

        //customizando ultimo link
        $config['last_tag_open'] = '<li>';
        $config['last_link'] = '<span aria-hidden="true"><i class="fa fa-angle-right"></i></span><small class="page-lable">Último</small>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $dados['paginacao'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        // Fim da páginação

        $dados['livros'] = $this->Acoes->findWithJoin('livros', 'categorias', 'categoria', $config['per_page'], $offset);
        $dados['categorias'] = $this->Acoes->findAll('categorias', 'nome');
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);

        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);

        $this->load->view('site/header');//Cabeçalho
        $this->load->view('site/index', $dados);
        $this->load->view('site/footer');//Rodape
    }

    //Página de Mais Detalhes Sobre o Livro
    public function detalhes($id)
    {
        $dados['categorias'] = $this->Acoes->findAll('categorias');
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
        $dados['livro'] = $this->Acoes->findByIdWithJoin('livros', $id, 'categorias','categoria', 'id');
        $dados['usuario_dado'] = $this->Acoes->findById('usuarios', $dados['livro']->usuario_livro);

        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/header');
        $this->load->view('site/detalhes', $dados);
        $this->load->view('site/footer');
    }

    //Página de Busca por Categoria
    public function busca($categoria_id, $categoria_nome)
    {
        $dados['livros'] = $this->Acoes->findByIdWithJoin('livros', $categoria_id, 'categorias', 'categoria','categoria', true);
        $dados['categorias'] = $this->Acoes->findAll('categorias', 'nome');
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
        $dados['categoria_pesquisada'] = $categoria_nome; //Apenas para exibição na Página de Busca
        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/header');//Cabeçalho
        $this->load->view('site/busca', $dados);
        $this->load->view('site/footer');//Rodape�
    }

    //Página de pesquisa strings
    public function pesquisa(){
        $pesquisa = $this->input->get('titulo');
        $dados['livros'] = $this->Acoes->findString('livros', $pesquisa);
        $dados['categorias'] = $this->Acoes->findAll('categorias', 'nome');
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
        $dados['string_pesquisada'] = $pesquisa; //Apenas para exibição na Página de Busca
        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/header');//Cabeçalho
        $this->load->view('site/pesquisa', $dados);
        $this->load->view('site/footer');//Rodape�
    }

    //Página Quem Somos
    public function quemSomos()
    {
        $dados['institucional'] = $this->Acoes->findAll('geral');
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/header');//Cabeçalho
        $this->load->view('site/quem_somos', $dados);
        $this->load->view('site/footer');//Rodap�
    }

    //Página Fale Conosco
    public function faleConosco()
    {
        $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
        $id = $this->session->userdata('usuario_session')['id'];
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/header');//Cabeçalho
        $this->load->view('site/fale_conosco', $dados);
        $this->load->view('site/footer');//Rodap�
    }

    public function sendContato()
    {
        if($this->Acoes->emailContato()){
            echo true;
        }else{
            echo false;
        }
    }

    // Cadastro E-mail na Newsletter
    public function cadastroNewsletter(){
        $this->output->set_content_type('application/json');
        $email = $this->Acoes->findByEmail('newsletter', $this->input->post('email'));
        if($email){
            echo 'existe';
        }else{
            if($this->Acoes->save('newsletter')){
                echo  true;
            }else{
                echo false;
            }
        }
    }

    //Recupera Senha
    public function recuperaSenha()
    {
        $this->output->set_content_type('application/json');
        $email = $this->input->post('email');
        if($this->Acoes->atualizaSenha($email)){
            echo  true;
        }else{
            echo  false;
        }
    }

}
