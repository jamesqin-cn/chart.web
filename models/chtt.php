<?php

/**
  *
���������

chtt=<ͼ�����>
ʹ�üӺ�+����ո�

����|��ʾ���С�

  */
class chtt
{
	private $_strChtt  = null;
	
	function __construct($strChtt = null)
	{
		$this->_strChtt = $strChtt;		
		$this->parse();
	}
	
	private function parse()
	{
		if (!empty($this->_strChtt)) {
			$this->_strChtt = str_replace('+', ' ', $this->_strChtt);
			$this->_strChtt = str_replace('|', "\n", $this->_strChtt);
			$this->_strChtt = urldecode($this->_strChtt);
			$this->_strChtt = mb_convert_encoding($this->_strChtt, 'gbk', 'utf8');
		}
	}
	
	public function getTitle()
	{
		return $this->_strChtt;
	}
}