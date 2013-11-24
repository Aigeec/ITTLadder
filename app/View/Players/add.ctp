<!-- File: /app/View/Player/add.ctp -->

<?php echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well'
)); ?>
	<fieldset>
		<legend>Add Player</legend>
		<?php echo $this->Form->input('text', array(
			'label' => 'Name',
			'placeholder' => 'Type something…',
			'after' => '<span class="help-block">Someones Name</span>'
		)); ?>		
		<?php echo $this->Form->submit('Submit', array(
			'div' => 'form-group',
			'class' => 'btn btn-default'
		)); ?>
	</fieldset>
<?php echo $this->Form->end(); ?>