<?php

class serviceSchedulesTest extends WebTestCase
{
	public $fixtures=array(
		'serviceSchedules'=>'serviceSchedules',
	);

	public function testShow()
	{
		$this->open('?r=serviceSchedules/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=serviceSchedules/create');
	}

	public function testUpdate()
	{
		$this->open('?r=serviceSchedules/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=serviceSchedules/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=serviceSchedules/index');
	}

	public function testAdmin()
	{
		$this->open('?r=serviceSchedules/admin');
	}
}
