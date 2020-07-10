<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
* Modified ITALSIS NOV 14 2014
* Log: Replace _ with Camel Case
*
*/

namespace proteccioncivil;

class errorCollector
{
	var $errors;

	function __construct()
	{
		$this->errors = array();
	}

	function install()
	{
		set_error_handler(array(&$this, 'errorHandler'));
	}

	function uninstall()
	{
		restore_error_handler();
	}

	function errorHandler($errno, $msgText, $errFile, $errLine)
	{
		$this->errors[] = array($errno, $msgText, $errFile, $errLine);
	}

	function formatErrors()
	{
		$text = '';
		foreach ($this->errors as $error)
		{
			if (!empty($text))
			{
				$text .= "<br />\n";
			}

			list($errno, $msgText, $errFile, $errLine) = $error;

			// Prevent leakage of local path to italsis install
			//$errfile = italsisFilterRootPath($errfile);

			$text .= "Errno $errno: $msgText at $errFile line $errLine";
		}

		return $text;
	}
}
