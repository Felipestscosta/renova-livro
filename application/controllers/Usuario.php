<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    //PÁGINA INICIAL
    public function home()
    {
        if($this->session->has_userdata('usuario_session'))
        {
            $id = $this->session->userdata('usuario_session')['id'];
            $dados['livros'] = $this->Acoes->findByCondicao('livros',  'usuario_livro', $this->session->userdata('usuario_session')['id']);
            $dados['categorias'] = $this->Acoes->findAll('categorias');
            $dados['categorias_rodape'] = array_slice($this->Acoes->findAll('categorias'), 0, 14);
            $dados['usuario'] = $this->Acoes->findById('usuarios', $id);

            //LIVROS QUE EU SOLICITEI
            $dados['solicitacoes'] = $this->Acoes->find('solicitacoes', 'solicitante', $id);
            foreach ($dados['solicitacoes'] as $chave => $valor){
                $dados['solicitado'][$chave] = $this->Acoes->find('usuarios', 'id', $valor->solicitado);
            }
            foreach ($dados['solicitacoes'] as $chave => $valor){
                $dados['livro_solicitado'][$chave] = $this->Acoes->find('livros', 'id', $valor->livro);
            }
            //LIVROS ME SOLICITADOS
            $dados['me_solicitado'] = $this->Acoes->find('solicitacoes', 'solicitado', $id);
            foreach ($dados['me_solicitado'] as $chave => $valor){
                $dados['me_solicitante'][$chave] = $this->Acoes->find('usuarios', 'id', $valor->solicitante);
            }
            foreach ($dados['me_solicitado'] as $chave => $valor){
                $dados['me_livro'][$chave] = $this->Acoes->find('livros', 'id', $valor->livro);
            }

            $this->load->view('site/usuario/header');//Cabeçalho
            $this->load->view('site/usuario/home', $dados);
            $this->load->view('site/usuario/footer');//Rodapé
        }else{
            $this->session->set_flashdata('erro', 'Você precisa estar logado');
            redirect('site');
        }
    }

    //***********************************
    // CRUD LIVROS
    //***********************************
    // EXIBE VIEW DE NOVO LIVRO
    public function viewNovoLivro()
    {
        $dados['categorias'] = $this->Acoes->findAll('categorias', 'nome');
        $this->load->view('site/usuario/modal/novo_livro', $dados);
    }

    //NOVO LIVRO
    public function acaoNovoLivro()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        if($this->Acoes->save('livros')){
            $this->session->set_flashdata('sucesso', 'Livro Disponibilizado com Sucesso!');
            redirect('usuario/home');
        }else{
            $this->session->set_flashdata('erro', 'Não conseguimos disponibilizar seu livro, desculpe. Fale com o administrador');
            redirect('usuario/home');
        }
    }

    //EXIBE VIEW DE EDIÇÃO DO LIVRO
    public function viewEditaLivro($id)
    {
        $dados['livro'] = $this->Acoes->findById('livros', $id);
        $dados['categorias'] = $this->Acoes->findAll('categorias', 'nome');
        $this->load->view('site/usuario/modal/edita_livro', $dados);
    }

    //EDITA LIVRO
    public function acaoEditaLivro()
    {
        $id = $this->input->post('id');
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        if($this->Acoes->update('livros', $id)){
            $this->session->set_flashdata('sucesso', 'As informações do livro foram alteradas com Sucesso!');
            redirect('usuario/home');
        }else{
            $this->session->set_flashdata('erro', 'conseguimos disponibilizar seu livro, desculpe. Fale com o administrador: adm@teste.com.br');
            redirect('usuario/home');
        }
    }

    //DELETA LIVRO
    public function deletaLivro($id)
    {
       if( $this->Acoes->delete('livros', $id)){
           $this->session->set_flashdata('sucesso', 'O livro foi Deletado dos Seus Livros Disponibilizados.');
           redirect('usuario/home');
       }
    }

    //***********************************
    // PARTE SOBRE A CONTA
    //***********************************

    //CRIA NOVA CONTA
    public function acaoNovoUsuario()
    {
        $email = $this->input->post('email');
        $retorno = $this->output->get_output($this->Acoes->save('usuarios', $email));
        @$retorno = json_decode($retorno)->return;
        if( $retorno == 'existe'){
            $this->session->set_flashdata('erro', 'Já existe um cadastro com esse <strong>Email</strong>');
            redirect('site');
        }else{
            $this->loginUsuario(true);
        }
    }

    //EXIBE VIEW DE EDIÇÃO DA CONTA
    public function viewEditaDados($id)
    {
        $dados['usuario'] = $this->Acoes->findById('usuarios', $id);
        $this->load->view('site/usuario/modal/edita_dados', $dados);
    }

    //EDITA A CONTA
    public function acaoEditaDados()
    {
        $id = $this->input->post('id');
        if($this->Acoes->update('usuarios', $id)){
            $this->session->set_flashdata('sucesso', 'As suas informações  foram modificadas com Sucesso!');
            redirect('usuario/home');
        }else{
            $this->session->set_flashdata('erro', 'Ops, algo deu errado, desculpe. Fale com o administrador: adm@teste.com.br');
            redirect('usuario/home');
        }
    }

    // LOGIN DO USUÁRIO
    public function loginUsuario($mensagem = null, $modal = null)
    {
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $usuario = $this->Acoes->findByEmail('usuarios',$email);
        if($usuario){
            if(password_verify($senha, $usuario->senha)){
                foreach($usuario as $chave => $valor){
                    $sessao_adm[$chave] = $valor;
                }
                $this->session->set_userdata(['usuario_session' => $sessao_adm]);
                if($mensagem){
                    $this->session->set_flashdata('sucesso', 'Sua conta está criada! Seja bem vindo <b>'.$this->session->userdata('usuario_session')['nome'].'</b>');
                }else{
                    $this->session->set_flashdata('sucesso', 'Seja bem vindo de volta<b> '.$this->session->userdata('usuario_session')['nome'].'</b>');
                }
                if($modal){
                    redirect('site');
                }else{
                    redirect('usuario/home');
                }

            }else{
                $this->session->set_flashdata('erro', '<strong>Senha</strong> ou <strong>Email</strong> inválido');
                redirect('site');
            }
        }else{
            $this->session->set_flashdata('erro', 'Você ainda não possui uma conta');
            redirect('site');
        }
    }

    //Verifica ISBN 10 Dig
    public function verificaIsbn($mYisbn)
    {
       if(is_numeric($mYisbn) && strlen($mYisbn) == 13){
            $peso = Array(1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3);
            $caracteres  = substr($mYisbn, 0, 12);
            $dv1		 = substr($mYisbn, 12, 1);
            $tam_caracter = strlen($caracteres);
            for( $i=0; $i <= $tam_caracter ; $i++ ){
                @$alg[$i] = $peso[$i] * $caracteres[$i];
                @$soma  = $soma + $alg[$i];
            }
            $resto = ($soma % 10);  // retorna o resto da divisão da soma pelo 11
            if ($resto == 0) {
                $dv2 = 0;
            }else{
                $dv2 = (10 - $resto) ;
            }
            if ($dv1 <> $dv2){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('return' => 'incorreto')));
            }else{
                $dados = $this->existeIsbn($mYisbn);
                if($dados){
                    return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('return' => 'correto', 'dados' => $dados)));
                }else{
                    return $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('return' => 'correto')));
                }

            }
        }else{
           return $this->output
               ->set_content_type('application/json')
               ->set_output(json_encode(array('return' => 'incorreto')));
        }
    }

    //VERIFICA SE JÁ EXISTE ISBN CADASTRADO NO BANCO E TRAS AS INFORMAÇÕES
    public function existeIsbn($isbn)
    {
        return $this->Acoes->find('livros', 'isbn', $isbn, true);
    }
    
    //SOLICITA LIVRO
    public function solicitaLivro()
    {
        if($this->Acoes->save('solicitacoes')){
            $this->atualizaStatus('indisponivel',$this->input->post('livro'));
            $this->Acoes->emailSolicitado();
            $this->Acoes->emailSolicitante();
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('res' => true)));
        }else{
            return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('res' => false)));
        }
    }

    //CANCELA UMA SOLICITAÇÃO
    public function cancelaSolicitacao($id, $id_livro)
    {
        $solicitacao = $this->Acoes->findById('solicitacoes', $id);
        if($solicitacao->status === 'entregue' || $solicitacao->status === 'enviado'){
            $this->session->set_flashdata('erro', 'Desculpe a solicitação já foi ENVIADA ou ENTREGUE');
            redirect('usuario/home');
        }else{
            if($this->Acoes->delete('solicitacoes',$id)){
                $this->atualizaStatus('disponivel',$id_livro);
                $this->adicionaPonto($this->session->userdata('usuario_session')['id']);
                $this->session->set_flashdata('sucesso', 'Solicitação Cancelada');
                redirect('usuario/home');
            }else{
                $this->session->set_flashdata('erro', 'Desculpe não conseguimos cancelar sua solicitação');
                redirect('usuario/home');
            }
        }
    }

    //ALTERA STATUS DO LIVRO
    public function atualizaStatus($status,$id_livro)
    {
        return $this->Acoes->updateStatus($status,$id_livro);
    }

    //ATUALIZA SOLICITACOES
    public function atualizaSolicitacoes($status,$id,$codigo_rastreio = null)
    {
        return $this->Acoes->updateSolicitacao($status,$id,$codigo_rastreio);
    }

    //VIEW ALTERA O STATUS
    public function viewAlteraStatus($id)
    {
        $dados['solicitacao'] = $this->Acoes->findById('solicitacoes', $id);
        $this->load->view('site/usuario/modal/altera_status', $dados);
    }

    //Adiciona Ponto
    public function finalizaSolicitacao($id, $id_solicitacao, $id_livro)
    {
        if($this->Acoes->acaoFinalizaSolicitacao($id, $id_solicitacao, $id_livro)){
            $this->session->set_flashdata('sucesso', 'Entrega confirmada com sucesso');
            redirect('usuario/home');
        }else{
            $this->session->set_flashdata('erro', 'Desculpe não conseguimos confirmar sua solicitação');
            redirect('usuario/home');
        }
    }

    //Remove as Solicitações Concluídas
    public function deletaHistoricoSolicitacao($id_solicitacao, $id_livro)
    {
        return $this->Acoes->acaoDeletaSolicitacao($id_solicitacao, $id_livro);
    }

    //Consulta as informações do Usuário
    public function infoUsuario($id)
    {
        $usuario = $this->Acoes->findById('usuarios', $id);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('pontos' => (Int)$usuario->pontos)));
    }

    //Remove o ponto após a Solicitação do Livro
    public function removePonto($id)
    {
        return $this->Acoes->acaoRemovePonto($id);
    }

    //Adiciona o ponto após cancelar Solicitação do Livro
    public function adicionaPonto($id)
    {
        return $this->Acoes->acaoAdicionaPonto($id);
    }


}
