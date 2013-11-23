<?php
class PersonsController extends AppController {
    public $helpers = array('Html', 'Form');

    public function index() {
        $this->set('persons', $this->Person->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid person'));
        }

        $person = $this->Person->findById($id);
        if (!$person) {
            throw new NotFoundException(__('Invalid person'));
        }
        $this->set('person', $person);
    }
}