<?php
$this->breadcrumbs=array(
	'Job Cards',
);

$this->menu=array(
	array('label'=>'Create JobCard','url'=>array('create')),
	array('label'=>'Manage JobCard','url'=>array('admin')),
);
?>

<h1>Job Cards</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	
)); ?>
