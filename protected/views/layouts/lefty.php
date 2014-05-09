<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-6">
            <div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
                        
 			$this->endWidget();
		?>
            </div><!-- sidebar -->
	</div>
	<div id="content" class="span-16">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
