<!-- File: /app/View/People/view.ctp -->

<h1><?php echo h($player['Player']['name']); ?></h1>
<p>Current Place: <?php echo h($player['Place'][0]['place']); ?></p>
<p>Last Place: <?php echo h($player['Place'][0]['last_place']); ?></p>
<p><small>Updated: <?php echo $player['Place'][0]['date']; ?></small></p>

