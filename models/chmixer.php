<?php

/**
  *
ˮӡ������

chmixer=<ͼ�����>
ʹ�üӺ�+����ո�

����|��ʾ���С�

  */
class chmixer
{
	private $_strChmixer  = null;
	
	function __construct($strChmixer = null)
	{
		$this->_strChmixer = $strChmixer;		
		$this->parse();
	}
	
	private function parse()
	{
		if (!empty($this->_strChmixer)) {
			$this->_strChmixer = str_replace('+', ' ', $this->_strChmixer);
			$this->_strChmixer = str_replace('|', "\n", $this->_strChmixer);
			$this->_strChmixer = urldecode($this->_strChmixer);
			$this->_strChmixer = mb_convert_encoding($this->_strChmixer, 'gbk', 'utf8');
		}
	}
	
	public function getMixer()
	{
		return $this->_strChmixer;
	}
}
