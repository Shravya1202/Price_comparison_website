<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TrendingProducts Controller
 *
 * @property \App\Model\Table\TrendingProductsTable $TrendingProducts
 * @method \App\Model\Entity\TrendingProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrendingProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('TrendingProducts');
        $trendingProducts = $this->TrendingProducts->find('all')->toArray();

        $this->loadModel('Categories');
        $categories = $this->Categories->find()->toArray();

        $this->set(compact('trendingProducts', 'categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Trending Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($tp_id = null)
    {
        $this->loadModel('TpStores');
        $trendingProduct = $this->TrendingProducts->get($tp_id);
        $tpStores = $this->TrendingProducts->TpStores->find()
            ->where(['tp_id' => $tp_id])
            ->all();

        $this->set(compact('trendingProduct', 'tpStores'));
    }

    public function subCategories($categoryId)
    {
        $this->loadModel('SubCategories');
        $subCategories = $this->SubCategories->find()
            ->where(['cat_id' => $categoryId])
            ->toArray();

        $this->set(compact('subCategories'));

        $this->loadModel('Products');
        $products = $this->Products->find()
            ->toArray();

        $this->set(compact('products'));
    }

    public function add()
    {
        $trendingProduct = $this->TrendingProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $trendingProduct = $this->TrendingProducts->patchEntity($trendingProduct, $this->request->getData());
            if ($this->TrendingProducts->save($trendingProduct)) {
                $this->Flash->success(__('The trending product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trending product could not be saved. Please, try again.'));
        }
        $this->set(compact('trendingProduct'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trending Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trendingProduct = $this->TrendingProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trendingProduct = $this->TrendingProducts->patchEntity($trendingProduct, $this->request->getData());
            if ($this->TrendingProducts->save($trendingProduct)) {
                $this->Flash->success(__('The trending product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trending product could not be saved. Please, try again.'));
        }
        $this->set(compact('trendingProduct'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trending Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trendingProduct = $this->TrendingProducts->get($id);
        if ($this->TrendingProducts->delete($trendingProduct)) {
            $this->Flash->success(__('The trending product has been deleted.'));
        } else {
            $this->Flash->error(__('The trending product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}