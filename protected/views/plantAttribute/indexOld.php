<?php
$this->breadcrumbs=array(
	'Plant Attributes',
);

$this->menu=array(
	array('label'=>'Create Plant Attribute', 'url'=>array('create')),
	array('label'=>'Manage Plant Attributes', 'url'=>array('admin')),
);
?>

<h1>Plant Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
