<?php
/**
 * This file is part of the Verraes\Money library
 *
 * Copyright (c) 2011 Mathias Verraes
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'bootstrap.php';

use Verraes\Money\Currency;
use Verraes\Money\EUR;
use Verraes\Money\USD;

class CurrencyTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->euro1 = new Currency('EUR');
		$this->euro2 = new Currency('EUR');
		$this->usd1 = new Currency('USD');
		$this->usd2 = new Currency('USD');
	}

	public function testDifferentInstancesAreEqual()
	{
		$this->assertTrue(
			$this->euro1->equals($this->euro2)
		);
		$this->assertTrue(
			$this->usd1->equals($this->usd2)
		);
	}

	public function testDifferentCurrenciesAreNotEqual()
	{
		$this->assertFalse(
			$this->euro1->equals($this->usd1)
		);
	}

	/**
	 * @test
	 * @expectedException Verraes\Money\UnknownCurrencyException
	 */
	public function testCantInstantiateUnknownCurrency()
	{
		new Currency('unknonw');
	}
}