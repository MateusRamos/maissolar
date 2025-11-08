<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Materiais Controller
 *
 * @property \App\Model\Table\MateriaisTable $Materiais
 * @method \App\Model\Entity\Materiai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriaisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sistemas'],
        ];
        $materiais = $this->paginate($this->Materiais);

        $this->set(compact('materiais'));
    }

    /**
     * View method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materiai = $this->Materiais->get($id, [
            'contain' => ['Sistemas'],
        ]);

        $this->set(compact('materiai'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materiai = $this->Materiais->newEmptyEntity();
        if ($this->request->is('post')) {
            $materiai = $this->Materiais->patchEntity($materiai, $this->request->getData());
            if ($this->Materiais->save($materiai)) {
                $this->Flash->success(__('The materiai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiai could not be saved. Please, try again.'));
        }
        $sistemas = $this->Materiais->Sistemas->find('list', ['limit' => 200])->all();
        $this->set(compact('materiai', 'sistemas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materiai = $this->Materiais->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materiai = $this->Materiais->patchEntity($materiai, $this->request->getData());
            if ($this->Materiais->save($materiai)) {
                $this->Flash->success(__('The materiai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materiai could not be saved. Please, try again.'));
        }
        $sistemas = $this->Materiais->Sistemas->find('list', ['limit' => 200])->all();
        $this->set(compact('materiai', 'sistemas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materiai id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materiai = $this->Materiais->get($id);
        if ($this->Materiais->delete($materiai)) {
            $this->Flash->success(__('The materiai has been deleted.'));
        } else {
            $this->Flash->error(__('The materiai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
