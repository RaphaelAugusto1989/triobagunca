<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function reais($numero) {
		return "R$ " . number_format($num, 2, ',', '.');
	}