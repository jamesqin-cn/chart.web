<?php

/**
  *
������ɫ
�趨����ͼ����״ͼ��ά��ͼ�ͱ�ͼ������ɫ��

chco=
<��ɫ����1>,
...
<��ɫ����n>

����<��ɫ����1>����������������ʹ��ʮ�����Ʋ�����

  */
class chco
{
	private $_strChco = null;
	private $_arrChco = null;
	
	function __construct($strChco = null)
	{
		$this->_strChco = $strChco;		
		$this->parse();
	}
	
	private function parse()
	{
		if (!empty($this->_strChco)) {
			$this->_arrChco = explode(',', $this->_strChco);
		} else {
			// Ĭ����ɫ
			$this->_arrChco = array('4d89f9');
		}
	}
	
	public function getVal()
	{
		return $this->_arrChco;
	}	
}
