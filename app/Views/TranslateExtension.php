<?php

namespace App\Views;

use Symfony\Component\Translation\Translator;

class TranslateExtension extends \Twig_Extension
{
	protected $translator;

	public function __construct(Translator $translator)
	{
		$this->translator = $translator;
	}

	public function getFunctions()
	{
		return [
            new \Twig_SimpleFunction('trans', [$this, 'trans']),
            new \Twig_SimpleFunction('trans_choice', [$this, 'transChoice'])
		];
	}

	public function trans($key, $parameters = [])
	{
        return $this->translator->trans($key, $parameters);
	}

	public function transChoice($key, $count = 1, $parameters = [])
	{
		return $this->translator->transChoice($key, $count, $parameters);
	}
}