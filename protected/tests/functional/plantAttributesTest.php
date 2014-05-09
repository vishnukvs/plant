<?php

class plantAttributesTest extends WebTestCase
{
	public $fixtures=array(
		'plantAttributes'=>'plantAttributes',
	);

	public function testShow()
	{
		$this->open('?r=plantAttributes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=plantAttributes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=plantAttributes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=plantAttributes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=plantAttributes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=plantAttributes/admin');
	}
}
