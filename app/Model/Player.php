<?php
class Player extends AppModel {
    public $hasMany = array(
        'Place' => array(            
            'order' => 'Place.date DESC'
        )    
    );

    public $hasOne = 'CurrentPlace';    

    public $order = 'CurrentPlace.place';
}