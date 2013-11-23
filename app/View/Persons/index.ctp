<!-- File: /app/View/Persons/index.ctp -->

<h1>Persons</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>        
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($persons as $person): ?>
    <tr>
        <td><?php echo $person['Person']['personId']; ?></td>
        <td>
            <?php echo $this->Html->link($person['Person']['name'],
array('controller' => 'posts', 'action' => 'view', $person['Person']['personId'])); ?>
        </td>        
    </tr>
    <?php endforeach; ?>
    <?php unset($person); ?>
</table>