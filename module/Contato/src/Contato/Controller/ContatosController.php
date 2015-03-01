<?php

namespace Contato\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContatosController extends AbstractActionController 
{
    public function indexAction() 
    {        
    }
    
    public function novoAction()
    {        
    }
    
    public function adicionarAction()
    {
        $request = $this->getRequest();
        
        if($request->isPost()){
            $postData = $request->getPost()->toArray();
            $formularioValido = false;
            if($formularioValido){
                $this->flashMessenger()->addSuccessMessage('Cadastro realizado com sucesso!');                
                return $this->redirect()->toRoute('contatos');
            }else{
                $this->flashMessenger()->addErrorMessage('Erro ao realizar cadastro');
                return $this->redirect()->toRoute('contatos', array('action'=>'novo'));
            }
        }
    }
    
    public function detalhesAction()
    { 
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if(!$id){
            $this->flashMessenger()->addMessage('Contato não encontrado!');
            return $this->redirect()->toRoute('contatos');
        }
        
        $form = array(
            'nome' => 'Igor Rocha',
            "telefone_principal" => "(085) 8585-8585",
            "telefone_secundario" => "(085) 8585-8585",
            "data_criacao" => "02/03/2013",
            "data_atualizacao" => "02/03/2013",
        );
        return array('id' => $id, 'form' => $form);
    }
    
    public function editarAction()
    {      
        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            $this->flashMessenger()->addMessage('Contato não encontrado!');
            return $this->redirect()->toRoute('contatos');
        }
        
        $form = array(
            'nome' => 'Igor Rocha',
            "telefone_principal" => "(085) 8585-8585",
            "telefone_secundario" => "(085) 8585-8585",
            "data_criacao" => "02/03/2013",
            "data_atualizacao" => "02/03/2013",
        );
        
        return array('id' => $id, 'form' => $form);
    }
    
    public function atualizarAction()
    {
        $request = $this->getRequest();
        
        if($request->isPost()){
            $postData = $request->getPost()->toArray();
            $formularioValido = true;
            if($formularioValido){
                $this->flashMessenger()->addSuccessMessage('Contato atualizado com sucesso!');
                return $this->redirect()->toRoute('contatos', array('action'=>'detalhes','id'=>$postData['id']));
            }else{
                $this->flashMessenger()->addErrorMessage('Erro ao atualizar contato!');
                return $this->redirect()->toRoute('contatos', array('action'=>'editar', 'id'=>$postData['id']));
            }
        }
    }
    
    public function deletarAction()
    {   
        $id = (int) $this->params()->fromRoute('id',0);
        if(!($id)){
            $this->flashMessenger()->addMessage('Contato não encontrado');
        }else{
            $this->flashMessenger()->addSuccessMessage("Contato de ID $id excluído!");
        }
        return $this->redirect()->toRoute('contatos');
    }
}

