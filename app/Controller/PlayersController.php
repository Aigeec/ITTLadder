<?php
class PlayersController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('players', $this->Player->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid player'));
        }

        $player = $this->Player->findById($id);
        if (!$player) {
            throw new NotFoundException(__('Invalid player'));
        }
        $this->set('player', $player);
    }

       public function add() {
        if ($this->request->is('post')) {
            $this->Player->create();
            if ($this->Player->save($this->request->data)) {
                $this->Session->setFlash(__('Your player has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your player.'));
        }
    }
}