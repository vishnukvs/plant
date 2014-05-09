<?php

class RepairTest extends WebTestCase
{
	public $fixtures=array(
		'repairs'=>'Repair',
	);

	public function testShow()
	{
		$this->open('?r=repair/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=repair/create');
	}

	public function testUpdate()
	{
		$this->open('?r=repair/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=repair/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=repair/index');
	}

	public function testAdmin()
	{
		$this->open('?r=repair/admin');
	}
}
