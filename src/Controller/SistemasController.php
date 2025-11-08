<?php
declare(strict_types=1);

namespace App\Controller;

class SistemasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sistemas = $this->paginate($this->Sistemas);

        $this->set(compact('sistemas'));
    }

    /**
     * View method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => ['Materiais'],
        ]);

        $this->set(compact('sistema'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sistema = $this->Sistemas->newEmptyEntity();
        if ($this->request->is('post')) {
            $sistema = $this->Sistemas->patchEntity($sistema, $this->request->getData());
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success(__('The sistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sistema could not be saved. Please, try again.'));
        }
        $this->set(compact('sistema'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sistema = $this->Sistemas->get($id, [
            'contain' => [],
        ]);
        
        // Separar endereço para edição
        if (!empty($sistema->endereco)) {
            $enderecoPartes = explode(', ', $sistema->endereco);
            $sistema->rua = $enderecoPartes[0] ?? '';
            $sistema->numero = $enderecoPartes[1] ?? '';
            $sistema->bairro = $enderecoPartes[2] ?? '';
            $sistema->cidade = $enderecoPartes[3] ?? '';
            $sistema->estado = $enderecoPartes[4] ?? '';
            $cepParte = $enderecoPartes[5] ?? '';
            $sistema->cep = str_replace('CEP: ', '', $cepParte);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            
            // Concatenar endereço
            if (isset($data['rua']) || isset($data['numero']) || isset($data['bairro']) || isset($data['cidade']) || isset($data['estado']) || isset($data['cep'])) {
                $endereco = [];
                if (!empty($data['rua'])) $endereco[] = $data['rua'];
                if (!empty($data['numero'])) $endereco[] = $data['numero'];
                if (!empty($data['bairro'])) $endereco[] = $data['bairro'];
                if (!empty($data['cidade'])) $endereco[] = $data['cidade'];
                if (!empty($data['estado'])) $endereco[] = $data['estado'];
                if (!empty($data['cep'])) $endereco[] = 'CEP: ' . $data['cep'];
                
                $data['endereco'] = implode(', ', $endereco);
                unset($data['rua'], $data['numero'], $data['bairro'], $data['cidade'], $data['estado'], $data['cep']);
            }
            
            // Calcular valor final dos materiais se houver custo extra
            if (isset($data['custo_extra_material']) && !empty($data['custo_extra_material'])) {
                $data['valor_materais_final'] = $sistema->valor_materiais_orcado + $data['custo_extra_material'];
            }
            
            $sistema = $this->Sistemas->patchEntity($sistema, $data);
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success('Sistema atualizado com sucesso!');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Erro ao salvar sistema. Verifique os dados.');
            }
        }
        $this->set(compact('sistema'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sistema id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sistema = $this->Sistemas->get($id);
        if ($this->Sistemas->delete($sistema)) {
            $this->Flash->success(__('The sistema has been deleted.'));
        } else {
            $this->Flash->error(__('The sistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Criar Orçamento method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function criarOrcamento()
    {
        $sistema = $this->Sistemas->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            // Concatenar endereço
            $endereco = [];
            if (!empty($data['rua'])) $endereco[] = $data['rua'];
            if (!empty($data['numero'])) $endereco[] = $data['numero'];
            if (!empty($data['bairro'])) $endereco[] = $data['bairro'];
            if (!empty($data['cidade'])) $endereco[] = $data['cidade'];
            if (!empty($data['estado'])) $endereco[] = $data['estado'];
            if (!empty($data['cep'])) $endereco[] = 'CEP: ' . $data['cep'];
            
            $data['endereco'] = implode(', ', $endereco);
            
            // Remover campos individuais
            unset($data['rua'], $data['numero'], $data['bairro'], $data['cidade'], $data['estado'], $data['cep']);
            
            // Definir status inicial como Orçamento
            $data['status'] = 1;
            
            $sistema = $this->Sistemas->patchEntity($sistema, $data);
            
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success('Orçamento criado com sucesso!');
                return $this->redirect(['action' => 'index']);
            } else {
                $errors = $sistema->getErrors();
                $errorMessages = [];
                foreach ($errors as $field => $fieldErrors) {
                    foreach ($fieldErrors as $error) {
                        $errorMessages[] = $field . ': ' . $error;
                    }
                }
                $this->Flash->error('Erros: ' . implode(', ', $errorMessages));
            }
        }
        
        $this->set(compact('sistema'));
    }

    public function avancarStatus()
    {
        $this->autoRender = false;
        $this->response = $this->response->withType('application/json');
        
        try {
            $sistemaId = $this->request->getData('sistema_id');
            $novoStatus = $this->request->getData('novo_status');
            
            // Debug - remover depois
            $allData = $this->request->getData();
            
            if (!$sistemaId || !$novoStatus) {
                echo json_encode([
                    'success' => false, 
                    'message' => 'Dados inválidos',
                    'debug' => [
                        'sistema_id' => $sistemaId,
                        'novo_status' => $novoStatus,
                        'all_data' => $allData
                    ]
                ]);
                return;
            }
            
            $sistema = $this->Sistemas->get($sistemaId);
            
            if ($novoStatus == 2) { // Aprovar orçamento
                $file = $this->request->getUploadedFile('orcamento_file');
                
                if ($file && $file->getError() === UPLOAD_ERR_OK) {
                    // Criar nome do arquivo baseado no cliente e data
                    $clienteNome = preg_replace('/[^a-zA-Z0-9]/', '_', $sistema->nome);
                    $dataAtual = date('Y-m-d');
                    $extensao = pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
                    $nomeArquivo = $clienteNome . '_' . $dataAtual . '.' . $extensao;
                    
                    // Diretório de destino
                    $uploadPath = WWW_ROOT . 'files' . DS . 'orcamentos' . DS;
                    
                    // Criar diretório se não existir
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }
                    
                    // Mover arquivo
                    $file->moveTo($uploadPath . $nomeArquivo);
                    
                    // Salvar caminho no banco
                    $sistema->orcamento_path = 'files/orcamentos/' . $nomeArquivo;
                } else {
                    echo json_encode(['success' => false, 'message' => 'Arquivo não enviado ou inválido']);
                    return;
                }
            }
            
            // Atualizar status
            $sistema->status = $novoStatus;
            
            if ($this->Sistemas->save($sistema)) {
                echo json_encode(['success' => true, 'message' => 'Status atualizado com sucesso']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Erro ao salvar no banco de dados']);
            }
            
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
        }
    }

    public function concluirInstalacao($id = null)
    {
        $sistema = $this->Sistemas->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $sistema->status = $data['status'];
            
            $sistema = $this->Sistemas->patchEntity($sistema, $data);
            
            if ($this->Sistemas->save($sistema)) {
                $this->Flash->success('Instalação concluída com sucesso!');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Erro ao concluir instalação. Verifique os dados.');
            }
        }
        
        $this->set(compact('sistema'));
    }
}
