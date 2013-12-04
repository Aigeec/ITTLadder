<?php
class Place extends AppModel {
    public $belongsTo = 'Player';
    public $virtualFields = array(
        'movement' => 'case	when place.place = place.last_place then "right"	when place.place < place.last_place then "up" when place.place > place.last_place then "down" end'
    );
}