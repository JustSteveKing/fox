<?php

namespace App\Message\Messenger;

class Message
{
	protected $body;

	protected $from;

	protected $to;

	public function __construct($body = null)
	{
		$this->setBody($body);
	}

	public function setBody($body)
	{
		$this->body = $body;
	}

	public function getBody()
	{
		return $this->body;
	}

	public function setFrom($number)
	{
		$this->from = $number;
	}

	public function setTo($to)
	{
		$this->to = $to;
	}

	public function getTo()
	{
		return $this->to;
	}
}