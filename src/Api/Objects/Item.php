<?php

namespace Contributte\GopayInline\Api\Objects;

use Contributte\GopayInline\Utils\Money;

class Item extends AbstractObject
{

	/** @var string */
	public $name;

	/** @var float */
	public $amount;

	/** @var int */
	public $count = 1;

	/** @var string|null */
	public $type;

	/** @var int|null */
	public $vatRate;

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return float
	 */
	public function getAmount()
	{
		return $this->amount;
	}

	/**
	 * @return int
	 */
	public function getCount()
	{
		return $this->count;
	}

	/**
	 * @return float
	 */
	public function getAmountInCents()
	{
		return Money::toCents($this->getAmount());
	}

	/**
	 * @return string|null
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @return int|null
	 */
	public function getVatRate()
	{
		return $this->vatRate;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @param float $amount
	 * @return void
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	/**
	 * @param int $count
	 * @return void
	 */
	public function setCount($count)
	{
		$this->count = intval($count);
	}

	/**
	 * @param string $type
	 * @return void
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @param int $vatRate
	 * @return void
	 */
	public function setVatRate($vatRate)
	{
		$this->vatRate = $vatRate;
	}

	/**
	 * ABSTRACT ****************************************************************
	 */

	/**
	 * @return array
	 */
	public function toArray()
	{
		$data = [];
		$data['name'] = $this->getName();
		$data['amount'] = $this->getAmountInCents();
		$data['count'] = $this->getCount();

		// NOT REQUIRED ====================================

		$type = $this->getType();
		if ($type !== NULL) {
			$data['type'] = $type;
		}

		$vatRate = $this->getVatRate();
		if ($vatRate !== NULL) {
			$data['vat_rate'] = $vatRate;
		}

		return $data;
	}

}
