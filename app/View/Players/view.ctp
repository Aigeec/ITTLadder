<!-- File: /app/View/People/view.ctp -->

<h1 class="text-center"><?php echo h($player['Player']['name']); ?></h1>
<table class="table table-striped" >
    <tr>
         <td>Current Place:</td>
         <td><?php echo h($player['CurrentPlace']['place']); ?></td>
    </tr>        
    <tr>
         <td>Last Place:</td>
         <td><?php echo h($player['CurrentPlace']['last_place']); ?></td>
    </tr>
    <tr>
         <td><small>Last updated:</small></td>
         <td><small><?php echo $player['CurrentPlace']['date']; ?></small></td>
    </tr>
</table>

<h2>History</h2>
<table class="table table-striped" >
    <tr>
        <th>Date</th>
        <th>Place</th>
    </tr>

    <!-- Here is where we loop through our $places array, printing out place history -->

    <?php foreach ($player['Place'] as $place): ?>
    <tr>
        <td>
            <?php echo $place['date']; ?>
        </td>        
        <td>
            <?php echo $place['place']; ?>
        </td>        
        <td>
            <span class="glyphicon glyphicon-arrow-<?php echo $place['movement']; ?> <?php echo $place['movement']; ?>"></span>            
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($place); ?>
</table>

<p><?php echo $this->Html->link('Back', $this->request->referer(), array('class' => 'button', 'target' => '_self')); ?></p>