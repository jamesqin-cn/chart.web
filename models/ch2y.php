<?php

/**
  *
ͼ������
ͼ�����������ָ�ʽ�� 

�ı����� ʹ������ 0 �� 100 ֮��ĸ�������
�����ֵ���Ų���ʹ��ʱ��Ҳ����ʹ�ø�����ע�⸺���Ե�ͼͼ����Ч��
ÿʮ����ֵռ�� 5 �����أ��ڽ�ʹ������������£������� 500 �������ڵ�ͼ������Ҫ���߾��ȣ���ʹ��һλС�����֣��� 92.6�����ı�����������������͵�ͼ����ͬʱҲ�� URL ��ַ������ݱ�����ʽ�� 
�򵥱��� ʹ�ô�Сд��ĸ�����֣�A����0��B����1��ֱ��9����61�������� 62 ����ֵ��
ÿ����ֵռ�� 5 �����أ������� 300 ���ش�С������ͼ����״ͼ������ͼ�����Ͷ�����ʹ�ü򵥱������ݡ��ñ����������ݵ�ͼ�� URL ��ַ������̡� 
��չ���� ʹ��һ����ĸ���ֱ�ʾһ�����ݣ����������ַ���������⣩��AA����0��AB����1��ֱ��..����4095��
���� 4096 ����ֵ�������ڸ߾��Ȼ����ͼ���ñ����������ݵ�ͼ�� URL ��ַ�����Ǽ򵥱���������� 

�ı�����
�ı������ʽΪ

ch2y=t:<��ֵ�ַ���>

����<��ֵ�ַ���>Ϊ0.0��100.0�ĸ�������-1����һ����|�����ߣ���

�������� 

��������0.0= 0���Դ�����100.0= 100�� 
��һ-1��ʾ��ֵ�� 
����|Ϊ���ݷ�����š� 

ʾ����ch2y=t:10.0,58.0,95.0|30.0,8.0,63.0

  */
class ch2y
{
	private $_strCh2y     = null;
	private $_strCh2yType = null;
	private $_strCh2yVal  = null;
	private $_arrCh2yVal  = null;
	
	function __construct($strCh2y = null)
	{
		$this->_strCh2y = $strCh2y;
		if(!empty($this->_strCh2y)){
			$this->parse();
		}
	}
	
	private function parse()
	{
		$arrCh2y = explode(":", $this->_strCh2y, 2);
		$this->_strCh2yType = $arrCh2y[0];
		$this->_strCh2yVal  = empty($arrCh2y[1]) ? null : $arrCh2y[1];
		
		switch ($this->_strCh2yType) {
			case 't':
				break;
			default:
				$error = "The parameter 'ch2y' have invalid type '{$this->_strCh2yType}'. ";
				require_once('./models/BadRequestException.php');
				throw new BadRequestException($error);
		}
		
		unset($this->_arrCh2yVal);
		$this->_arrCh2yVal = array();
		$i = $j = 0;
		
		$arrGroup = explode('|', $this->_strCh2yVal);
		if (!empty($arrGroup)) {
			foreach ($arrGroup as $group) {
				$row = explode(',', $group);
				if (!empty($group)) {
					$j = 0;
					foreach ($row as $one) {
						$this->_arrCh2yVal[$i][$j] = floatval($one);
						++$j;
					}
				}
									
				++$i;
			}
		}
	}
	
	public function getMaxNum()
	{
		$max = 0;
		foreach ($this->_arrCh2yVal as $row) {
			$thismax = max($row);
			
			if ($thismax > $max) {
				$max = $thismax;
			}
		}
		return $max;
	}
	
	public function getVal()
	{
		return $this->_arrCh2yVal;
	}
}
