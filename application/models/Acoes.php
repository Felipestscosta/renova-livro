<?php

class Acoes extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    //TRAZ RESULTADOS BUSCANDO PARÂMETRO SOLICITADO
    public function find($tabela,$where,$dado, $first_row = null)
    {
        if($first_row){
            return $this->db->get_where($tabela, array($where => $dado))->first_row();
        }else{
            return $this->db->get_where($tabela, array($where => $dado))->result();
        }
    }

    //TRAZ OS RESULTADOS COM JOIN ENTRE TABELAS
    public function findWithJoin($tabela, $join, $coluna, $limit = null, $offset = null){
        $this->db->select(" *, $join.nome as nome_{$join}, $tabela.id as id_{$tabela}");
        $this->db->from($tabela);
        $this->db->join($join, "$join.id = $tabela.$coluna");
        if($limit){
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();
    }

    //TRAZ OS RESULTADOS COM JOIN ENTRE TABELAS COM ID
    public function findByIdWithJoin($tabela, $id, $join, $coluna, $where, $result = null){
        $this->db->select(" *, $join.nome as nome_{$join}, $tabela.id as id_{$tabela}");
        $this->db->from($tabela);
        $this->db->where("{$tabela}.{$where}", $id);
        $this->db->join($join, "$join.id = $tabela.$coluna");
        if($result){
            return $this->db->get()->result();
        }else{
            return $this->db->get()->first_row();
        }

    }

    //TRAZ TODOS OS RESULTADOS POR TABELA ESCOLHIDA
    public function findAll($tabela, $order = null)
    {
        $this->db->select("*");
        $this->db->from($tabela);
        if($order){
            $this->db->order_by($order, 'asc');
        }
        return $this->db->get()->result();
    }

    //TRAZ RESULTADOS BUSCANDO EMAIL COMO PARÂMETRO
    public function findByEmail($tabela, $email)
    {
        return $this->db->get_where($tabela, array('email' => $email))->first_row();
    }

    //PESQUISA DE STRING
    public function findString($tabela, $pesquisa, $first_row = null){
        $this->db->select('*');
        $this->db->from($tabela);
        $this->db->like('titulo', $pesquisa);
        if($first_row){
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }

    }

    //TRAZ RESULTADOS BUSCANDO ID COMO PARÂMETRO
    public function findById($tabela, $id)
    {
        return $this->db->get_where($tabela, array('id' => $id))->first_row();
    }

    //Faz uma busca Através de uma Codição Passada
    public function findByCondicao($tabela, $condicao, $dado){
        return $this->db->get_where($tabela, array($condicao => $dado))->result();
    }

    //Insere Novos Dados
    public function save($tabela, $usuario = null)
    {
        if($usuario){
            if($this->findByEmail('usuarios', $this->input->post('email') )){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('return' => 'existe')));
            }else{
                foreach($this->input->post() as $campo => $valor){
                    if($campo == 'senha'){
                        $data[$campo] = password_hash($valor, PASSWORD_BCRYPT);
                    }else{
                        $data[$campo] = $valor;
                    }
                }
                if($_FILES){
                    if($this->upload->do_upload('imagem')){
                        $data['imagem'] = $this->upload->data('file_name');
                    }else{
                        $data['imagem'] = null;
                    }
                }
                return $this->db->insert($tabela, $data);
            }
        }else{
            foreach($this->input->post() as $campo => $valor){
                if($campo == 'senha'){
                    $data[$campo] = password_hash($valor, PASSWORD_BCRYPT);
                }else{
                    $data[$campo] = $valor;
                }
            }
            if($_FILES){
                if($this->upload->do_upload('imagem')){
                    $data['imagem'] = $this->upload->data('file_name');
                }else{
                    $data['imagem'] = null;
                }
            }
            return $this->db->insert($tabela, $data);
        }

    }

    //Atualiza Dados
    public function update($tabela, $id)
    {
        $dado = $this->findById($tabela, $id);
        foreach($this->input->post() as $campo => $valor){
            if($campo == 'senha'){
                if(!empty($valor)){
                    $data[$campo] = password_hash($valor, PASSWORD_BCRYPT);
                }else{
                    $data[$campo] = $dado->senha;
                }
            }else{
                $data[$campo] = $valor;
            }
        }
        if($_FILES){
            if($this->upload->do_upload('imagem')){
                $data['imagem'] = $this->upload->data('file_name');
            }else{
                if($dado->imagem){
                    $data['imagem'] = $dado->imagem;
                }
            }
        }
        $this->db->where('id', $id);
        return $this->db->update($tabela, $data);
    }

    //Atualiza o status do livro
    public function updateStatus($status, $id)
    {
        $data = [ 'status' => $status ];
        $this->db->where('id', $id);
        return $this->db->update('livros', $data);
    }

    //Atualiza o status do livro
    public function updateSolicitacao($status, $id, $codigo_rastreio = null)
    {
        if($codigo_rastreio){
            $data = [ 'cod_rastreio' => $codigo_rastreio,'status' => $status ];
        }else{
            $data = [ 'status' => $status ];
        }
        $this->db->where('id', $id);
        return $this->db->update('solicitacoes', $data);
    }

    //Ação Atualiza Senha
    public function atualizaSenha($email)
    {
        $nova_senha = rand(999,9999);
        $senha_banco = password_hash($nova_senha, PASSWORD_BCRYPT);

        $dados = $this->Acoes->findByEmail('usuarios', $email);

        $data = [  'senha' => $senha_banco ];
        $this->db->where('id', $dados->id);

        if($this->db->update('usuarios', $data)){
            return $this->enviaEmail($nova_senha, $email);
        }else{
            return false;
        }
    }

     //Ação Atualiza Senha
    public function atualizaSenhaAdm($email)
    {
        $nova_senha = rand(999,9999);
        $senha_banco = password_hash($nova_senha, PASSWORD_BCRYPT);

        $dados = $this->Acoes->findByEmail('administradores', $email);
        $data = [  'senha' => $senha_banco ];
        $this->db->where('id', $dados->id);

        if($this->db->update('administradores', $data)){
            return $this->enviaEmail($nova_senha, $email);
        }else{
            return false;
        }
    }

    //Deleta Dados
    public function delete($tabela, $id){
        return $this->db->delete($tabela, array('id' => $id));
    }

    public function enviaEmail($senha,$email = 'fastdevbr@gmail.com')
    {
        $subject = 'Renova Livros - Senha Alterada!';
        $message = "<p>Sua nova senha de acesso é: {$senha}</p>";

        // Get full html:
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
            <title>' . html_escape($subject) . '</title>
            <style type="text/css">
                body {
                    font-family: Arial, Verdana, Helvetica, sans-serif;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
        ' . $message . '
        </body>
        </html>';

        $result = $this->email
            ->from('autentica@dentalodontomoura.com.br')
            ->to($email)
            ->subject($subject)
            ->message($body)
            ->send();

        if($result){
            return  true;
        }else{
            return false;
        }
    }

    //Email de contato
    public function emailContato()
    {
        $subject = 'Nova mensagem do Site';
        $message = "
                                <h3><b>{$_POST['nome']} lhe enviou uma mensagem</b></h3>
                                <hr>
                                <b>Email: </b>{$_POST['email']}<br>
                                <b>Telefone: </b>{$_POST['telefone']}<br>
                                <b>Mensagem: </b>{$_POST['mensagem']}
                            ";

        // Get full html:
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
            <title>' . html_escape($subject) . '</title>
            <style type="text/css">
                body {
                    font-family: Arial, Verdana, Helvetica, sans-serif;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
        ' . $message . '
        </body>
        </html>';

        return $this->email
            ->from('autentica@dentalodontomoura.com.br')
            ->to($_POST['email'])
            ->subject($subject)
            ->message($body)
            ->send();
    }

    //Email de Notificação de Solicitação do Livro
    public function emailSolicitado()
    {
        $dados_solicitante = $this->findById('usuarios',$this->input->post('solicitante'));
        $dados_solicitado = $this->findById('usuarios',$this->input->post('solicitado'));
        $dados_livro = $this->findById('livros',$this->input->post('livro'));
        $subject = "Fale com o {$dados_solicitado->nome} sobre o Livro - Renova Livro";

        $solicitado = null;
        foreach ($dados_solicitado as $chave => $valor){
            if($chave === 'senha' || $chave === 'pontos' || $chave === 'id'){
            }else{
                $solicitado .= "<p><b>{$chave}</b>: {$valor}</p>";
            }

        }

        $livro = null;
        foreach ($dados_livro as $chave => $valor){
            if($chave === 'id' || $chave === 'isbn' || $chave === 'categoria' || $chave === 'descricao' || $chave === 'imagem' || $chave === 'usuario_livro' || $chave === 'status'){
            }else{
                $livro .= "<p><b>{$chave}</b>: {$valor}</p>";
            }

        }

        $body = '<html>
            <head>
                <title>Dados do livro Solicitado</title>
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <meta charset="utf-8">
                <style>
                    body{ background-color: #232323; text-transform: uppercase }
                    *{ text-align: center; color: #232323;font-family: "Roboto", sans-serif; }
                    table{ width: 600px;background-color: #f2f2f2; }
                    .topo img{height: 120px}
                    .conteudo p{ text-align: left; }
                </style>
            </head>
            <body>
                <table align="center" cellpadding="22">
                    <tr class="topo">
                        <td><img src="http://renovalivros.web2451.uni5.net/assets/images/logo.png" alt=""></td>
                    </tr>
                    <tr>
                        <td class="conteudo">
                            <hr>
                            <p style="text-align: center"><b>Dados para contato</b></p>
                            '.$solicitado.'
                            <br>
                            <p style="text-align: center"><b>Livro Solicitado</b></p>
                            '.$livro.'
                        </td>
                    </tr>
                    <tr>
                        <td><hr><h6>fale conosco: contato@renovalivro.com.br</h6></td>
                    </tr>
                </table>
            </body>
            </html>';
        return $this->email
            ->from('autentica@dentalodontomoura.com.br')
            ->to($dados_solicitante->email)
            ->subject($subject)
            ->message($body)
            ->send();
    }

    //Email de Notificação de Solicitação do Livro
    public function emailSolicitante()
    {
        $dados_solicitante = $this->findById('usuarios',$this->input->post('solicitante'));
        $dados_solicitado = $this->findById('usuarios',$this->input->post('solicitado'));
        $dados_livro = $this->findById('livros',$this->input->post('livro'));
        $subject = "Seu Livro foi solicitado por {$dados_solicitante->nome} - Renova Livro";

        $solicitante = null;
        foreach ($dados_solicitante as $chave => $valor){
            if($chave === 'senha' || $chave === 'pontos' || $chave === 'id'){
            }else{
                $solicitante .= "<p><b>{$chave}</b>: {$valor}</p>";
            }

        }
        $livro = null;
        foreach ($dados_livro as $chave => $valor){
            if($chave === 'id' || $chave === 'isbn' || $chave === 'categoria' || $chave === 'descricao' || $chave === 'imagem' || $chave === 'usuario_livro' || $chave === 'status'){
            }else{
                $livro .= "<p><b>{$chave}</b>: {$valor}</p>";
            }

        }
        $body = '<html>
            <head>
                <title>Dados do livro Solicitado</title>
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <meta charset="utf-8">
                <style>
                    body{ background-color: #232323;}
                    *{ text-align: center; color: #232323;font-family: "Roboto", sans-serif; }
                    table{ width: 600px;background-color: #f2f2f2; }
                    .topo img{height: 120px}
                    .conteudo p{ text-align: left; }
                </style>
            </head>
            <body>
                <table align="center" cellpadding="22">
                    <tr class="topo">
                        <td><img src="http://renovalivros.web2451.uni5.net/assets/images/logo.png" alt=""></td>
                    </tr>
                    <tr>
                        <td class="conteudo">
                            <hr>
                            <p style="text-align: center;text-transform: uppercase"><b>Fale com o dono do Livro</b></p>
                            '.$solicitante.'
                            <br>
                            <p style="text-align: center;text-transform: uppercase"><b>Dados do livro</b></p>
                            '.$livro.'
                        </td>
                    </tr>
                    <tr>
                        <td><hr><h6>fale conosco: contato@renovalivro.com.br</h6></td>
                    </tr>
                </table>
            </body>
            </html>';

        return $this->email
            ->from('autentica@dentalodontomoura.com.br')
            ->to($dados_solicitado->email)
            ->subject($subject)
            ->message($body)
            ->send();
    }

    //Acao Finaliza Solicitação
    public function acaoFinalizaSolicitacao($id, $id_solicitacao, $id_livro = null)
    {
        $pontos = $this->Acoes->findById('usuarios', $id)->pontos+1;
        if($id){
            $this->db->where('id',$id);
            if($this->db->update('usuarios', ['pontos' => $pontos])){
                if($id_solicitacao){
                    $this->db->where('id',$id_solicitacao);
                    return $this->db->update('solicitacoes', ['status' => 'entregue', 'data_entrega' => date('Y-m-d')]);
                }
            }
        }

    }

    //Ação Deleta Finalização
    public function acaoDeletaSolicitacao($id_solicitacao, $id_livro)
    {
        if($id_solicitacao){
            $this->db->delete('solicitacoes', array('id' => $id_solicitacao));
        }
        if($id_livro){
            $this->db->delete('livros', array('id' => $id_livro));
        }
    }

    //Remove 1 ponto do Usuário que Solicitou o Livro
    public function acaoRemovePonto($id)
    {
        $dado = $this->findById('usuarios', $id);
        $pontos = $dado->pontos - 1;
        $data = [ 'pontos' => $pontos ];
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }

    //Adiciona 1 ponto do Usuário que Solicitou o Livro
    public function acaoAdicionaPonto($id)
    {
        $dado = $this->findById('usuarios', $id);
        $pontos = $dado->pontos + 1;
        $data = [ 'pontos' => $pontos ];
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }

}