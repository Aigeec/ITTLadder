<?php
class PlayersController extends AppController {
    public $helpers = array('Html', 'Form');   

    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.username' => 'asc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'admin_index', 'admin_view', 'admin_edit', 'admin_delete', 'admin_swap');
    }     

    public function index() {
        $this->set('players', $this->Player->find('all'));
        $this->set('cols', 6);
    }

    public function admin_index() {        
        $this->Player->recursive = 0;
        $this->set('players', $this->paginate());        
        $this->set('cols', 8);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid player'));
        }

        $player = $this->Player->findById($id);
        if (!$player) {
            throw new NotFoundException(__('Invalid player'));
        }
        $this->set('cols', 6);
        $this->set('player', $player);
    }

    public function admin_view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid player'));
        }

        $player = $this->Player->findById($id);
        if (!$player) {
            throw new NotFoundException(__('Invalid player'));
        }
        $this->set('cols', 6);
        $this->set('player', $player);
    }

    public function admin_add() {
        $this->set('cols', 6);
        if ($this->request->is('post')) {
            $this->Player->create();            
            if ($this->Player->save($this->request->data)) {
                $this->Session->setFlash(__('Your player has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }            
            $this->Session->setFlash(__('Unable to add your player.'));
        }
    }

    public function admin_edit($id = null) {
        $this->Player->id = $id;
        if (!$this->Player->exists()) {
            throw new NotFoundException(__('Invalid player'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Player->save($this->request->data)) {
                $this->Session->setFlash(__('The player has been saved'), 'alert', array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The player could not be saved. Please, try again.'), 'alert', array(
	            'plugin' => 'BoostCake',
	            'class' => 'alert-danger'
            ));
        } else {
            $this->request->data = $this->Player->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        $this->request->onlyAllow('post');

        $this->Player->id = $id;
        if (!$this->Player->exists()) {
            throw new NotFoundException(__('Invalid player'));
        }
        if ($this->Player->delete()) {
            $this->Session->setFlash(__('Player deleted'), 'alert', array(
	            'plugin' => 'BoostCake',
	            'class' => 'alert-success'
            ));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Player was not deleted'), 'alert', array(
	            'plugin' => 'BoostCake',
	            'class' => 'alert-danger'
            ));
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_swap($id, $other_id = null){

        if($other_id != null){
            $player = $this->Player->findById($id);

            if (!isset($player)  || $player == array()) {
                $this->Session->setFlash(__('Invalid first player'), 'alert', array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-danger'
                ));    
                return $this->redirect($this->Auth->redirect());
            }

            $other_player = $this->Player->findById($other_id);

            if (!isset($other_player) || $other_player == array()) {            
                $this->Session->setFlash(__('Invalid second player'), 'alert', array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-danger'
                ));    
                return $this->redirect($this->Auth->redirect());
            }

            $this->Player->begin();

            try{
                $this->Player->Place->create(array('player_id' =>  $player['Player']['id'], 'date'=>'2014-01-03', 'place' => $other_player['CurrentPlace']['place'], 'last_place' => $player['CurrentPlace']['place']));        
                $success = $this->Player->Place->save();
                $this->Player->Place->create(array('player_id' =>  $other_player['Player']['id'], 'date'=>'2014-01-04', 'place' => $player['CurrentPlace']['place'], 'last_place' => $other_player['CurrentPlace']['place']));        
                $success = $success && $this->Player->Place->save();
            }catch(Exception $e){
                $success = FALSE;
            }              
       
            if($success){        
                $this->Player->commit();
                $this->Session->setFlash(__('Players swapped'), 'alert', array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Player->rollback();
                $this->Session->setFlash(__('Unable to swap players.'), 'alert', array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-danger'
                ));            
            }        

            return $this->redirect(array('action' => 'index'));
        }else{
            $this->Player->recursive = 0;
            $this->set('players', $this->paginate());       
            $this->set('first_id', $id);       
        }
    }
}