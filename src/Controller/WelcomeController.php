<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Welcome Controller
 *
 *
 * @method \App\Model\Entity\Welcome[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WelcomeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       // $welcome = $this->paginate($this->Welcome);

        //$this->set(compact('welcome'));
       $this->render('welcome');

    }
    


    /**
     * View method
     *
     * @param string|null $id Welcome id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $welcome = $this->Welcome->get($id, [
            'contain' => []
        ]);

        $this->set('welcome', $welcome);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $welcome = $this->Welcome->newEntity();
        if ($this->request->is('post')) {
            $welcome = $this->Welcome->patchEntity($welcome, $this->request->getData());
            if ($this->Welcome->save($welcome)) {
                $this->Flash->success(__('The welcome has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The welcome could not be saved. Please, try again.'));
        }
        $this->set(compact('welcome'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Welcome id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $welcome = $this->Welcome->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $welcome = $this->Welcome->patchEntity($welcome, $this->request->getData());
            if ($this->Welcome->save($welcome)) {
                $this->Flash->success(__('The welcome has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The welcome could not be saved. Please, try again.'));
        }
        $this->set(compact('welcome'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Welcome id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $welcome = $this->Welcome->get($id);
        if ($this->Welcome->delete($welcome)) {
            $this->Flash->success(__('The welcome has been deleted.'));
        } else {
            $this->Flash->error(__('The welcome could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
