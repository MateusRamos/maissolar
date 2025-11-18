<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orcamentos Controller
 *
 * @property \App\Model\Table\OrcamentosTable $Orcamentos
 * @method \App\Model\Entity\Orcamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrcamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $orcamentos = $this->paginate($this->Orcamentos);

        $this->set(compact('orcamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orcamento = $this->Orcamentos->get($id, [
            'contain' => ['Materiais' => ['sort' => ['Materiais.id' => 'ASC']]],
        ]);

        $this->set(compact('orcamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orcamento = $this->Orcamentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $orcamento = $this->Orcamentos->patchEntity($orcamento, $data);
            
            if ($this->Orcamentos->save($orcamento)) {
                // Salvar materiais se existirem
                if (!empty($data['materiais'])) {
                    $materiais = json_decode($data['materiais'], true);
                    foreach ($materiais as $material) {
                        $materialEntity = $this->Orcamentos->Materiais->newEmptyEntity();
                        $materialData = [
                            'descricao' => $material['nome'],
                            'qnt' => $material['quantidade'],
                            'preco_unitario' => $material['preco_unitario'],
                            'valor_unit' => $material['preco_unitario'],
                            'valor_total' => $material['quantidade'] * $material['preco_unitario'],
                            'orcamento_id' => $orcamento->id,
                            'is_extra' => 0,
                            'is_active' => 1
                        ];
                        $materialEntity = $this->Orcamentos->Materiais->patchEntity($materialEntity, $materialData);
                        $this->Orcamentos->Materiais->save($materialEntity);
                    }
                }
                
                $this->Flash->success(__('Orçamento salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar orçamento. Tente novamente.'));
        }
        $this->set(compact('orcamento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orcamento = $this->Orcamentos->get($id, [
            'contain' => ['Materiais' => ['sort' => ['Materiais.id' => 'ASC']]],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $orcamento = $this->Orcamentos->patchEntity($orcamento, $data);
            
            if ($this->Orcamentos->save($orcamento)) {
                // Deletar materiais existentes
                $this->Orcamentos->Materiais->deleteAll(['orcamento_id' => $id]);
                
                // Salvar novos materiais
                if (!empty($data['materiais'])) {
                    $materiais = json_decode($data['materiais'], true);
                    foreach ($materiais as $material) {
                        $materialEntity = $this->Orcamentos->Materiais->newEmptyEntity();
                        $materialData = [
                            'descricao' => $material['nome'],
                            'qnt' => $material['quantidade'],
                            'preco_unitario' => $material['preco_unitario'],
                            'valor_unit' => $material['preco_unitario'],
                            'valor_total' => $material['quantidade'] * $material['preco_unitario'],
                            'orcamento_id' => $orcamento->id,
                            'is_extra' => 0,
                            'is_active' => 1
                        ];
                        $materialEntity = $this->Orcamentos->Materiais->patchEntity($materialEntity, $materialData);
                        $this->Orcamentos->Materiais->save($materialEntity);
                    }
                }
                
                $this->Flash->success(__('Orçamento atualizado com sucesso!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao atualizar orçamento. Tente novamente.'));
        }
        $this->set(compact('orcamento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orcamento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orcamento = $this->Orcamentos->get($id);
        if ($this->Orcamentos->delete($orcamento)) {
            $this->Flash->success(__('The orcamento has been deleted.'));
        } else {
            $this->Flash->error(__('The orcamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pdf($id = null)
    {
        $orcamento = $this->Orcamentos->get($id, [
            'contain' => ['Materiais' => ['sort' => ['Materiais.id' => 'ASC']]],
        ]);

        $this->viewBuilder()->setLayout('pdf');
        $this->set(compact('orcamento'));
    }
}
