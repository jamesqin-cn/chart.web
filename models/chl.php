<?php

/**
  *
��ͼ��ע
��ͼ��ע������

chl=<��עһ>|
...
<��ע n> 

˫����||��ʾ��ֵ��


  */
class chl
{
	private $_strChl = null;
	private $_arrChl = null;
	
	function __construct($strChl = null)
	{
		$this->_strChl = $strChl;		
		$this->parse();
	}
	
	private function parse()
	{
		if (!empty($this->_strChl)) {
			$this->_arrChl = explode('|', $this->_strChl);
		}

		if (!empty($this->_arrChl)) {
			foreach ($this->_arrChl as $key => $val) {
				$this->_arrChl[$key] = urldecode(mb_convert_encoding($val, 'gbk', 'utf8'));
			}
		}
	}
	
	public function getVal()
	{
		return $this->_arrChl;
	}	
}
