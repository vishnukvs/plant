<?php

class MaintenanceEventsTest extends WebTestCase
{
	public $fixtures=array(
		'maintenanceEvents'=>'MaintenanceEvents',
	);

	public function testShow()
	{
		$this->open('?r=maintenanceEvents/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=maintenanceEvents/create');
	}

	public function testUpdate()
	{
		$this->open('?r=maintenanceEvents/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=maintenanceEvents/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=maintenanceEvents/index');
	}

	public function testAdmin()
	{
		$this->open('?r=maintenanceEvents/admin');
	}
}
