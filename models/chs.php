<?php

/**
  *
������ʽ��chs=<���ؿ��>x<���ظ߶�>

���磺chs=300x200����ʾһ�� 300 ���ؿ�200 ���ظߵ�ͼ��

����ͼ�����ߴ�Ϊ 300,000 ƽ�����أ�������Ϊ 1000 ���أ����³ߴ��Ϊ�����óߴ磺1000x300��300x1000��600x500��500x600��800x375 �� 375x800 �ȡ�

��ͼ���ߴ� 440 ���ؿ�� 220 ���ظߡ�

�ߴ��Сʱ����ͼ������ʾ����ͼ����ͼ����ߴ磺 

��ά��ͼ�����ԼΪ�߶������� 
��ά��ͼ�����ԼΪ�߶������롣 

  */
class chs
{
	private $_strChs  = null;
	private $_iWidth  = 0;
	private $_iHeight = 0;
	
	function __construct($strChs)
	{
		if (empty($strChs)) {
			$error = "The parameter 'chs' must not be empty. ";
			require_once('./models/BadRequestException.php');
			throw new BadRequestException($error);
		}
		
		$this->_strChs = $strChs;		
		$this->parse();
	}
	
	private function parse()
	{
		$arr = explode('x', $this->_strChs);
		if (count($arr) != 2) {
			$error = "The parameter 'chs' does not match the expected format.";
			require_once('./models/BadRequestException.php');
			throw new BadRequestException($error);
		}
		
		$this->_iWidth  = intval($arr[0]);
		$this->_iHeight = intval($arr[1]);
	}
	
	public function getWidth()
	{
		return $this->_iWidth;
	}	
	
	public function getHeight()
	{
		return $this->_iHeight;
	}
}