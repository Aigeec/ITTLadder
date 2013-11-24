<!-- File: /app/View/Players/index.ctp -->

<table class="table table-striped" >
    <tr>
        <th>Place</th>
        <th>Name</th>
    </tr>

    <!-- Here is where we loop through our $players array, printing out player info -->

    <?php foreach ($players as $player): ?>
    <tr>
        <td>
            <?php echo $player['Place'][0]['place']; ?>
        </td>        
        <td>
            <?php echo $this->Html->link($player['Player']['name'],
            array('controller' => 'players', 'action' => 'view', $player['Player']['id'])); ?>
        </td>        
        <td>
            <span class="glyphicon glyphicon-arrow-<?php echo $player['Place'][0]['movement']; ?>"></span>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($player); ?>
</table>