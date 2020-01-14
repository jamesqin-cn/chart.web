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

chd=t:<��ֵ�ַ���>

����<��ֵ�ַ���>Ϊ0.0��100.0�ĸ�������-1����һ����|�����ߣ���

�������� 

��������0.0= 0���Դ�����100.0= 100�� 
��һ-1��ʾ��ֵ�� 
����|Ϊ���ݷ�����š� 

ʾ����chd=t:10.0,58.0,95.0|30.0,8.0,63.0

  */
class chd
{
	private $_strChd     = null;
	private $_strChdType = null;
	private $_strChdVal  = null;
	private $_arrChdVal  = null;
	
	function __construct($strChd)
	{
		if (empty($strChd)) {
			$error = "The parameter 'chd' must not be empty. ";
			require_once('./models/BadRequestException.php');
			throw new BadRequestException($error);
		}
		
		$this->_strChd = $strChd;
		$this->parse();
	}
	
	private function parse()
	{
		$arrChd = explode(":", $this->_strChd, 2);
		$this->_strChdType = $arrChd[0];
		$this->_strChdVal  = empty($arrChd[1]) ? null : $arrChd[1];
		
		switch ($this->_strChdType) {
			case 't':
				break;
			default:
				$error = "The parameter 'chd' have invalid type '{$this->_strChdType}'. ";
				require_once('./models/BadRequestException.php');
				throw new BadRequestException($error);
		}
		
		unset($this->_arrChdVal);
		$this->_arrChdVal = array();
		$i = $j = 0;
		
		$arrGroup = explode('|', $this->_strChdVal);
		if (!empty($arrGroup)) {
			foreach ($arrGroup as $group) {
				$row = explode(',', $group);
				if (!empty($group)) {
					$j = 0;
					foreach ($row as $one) {
						$one = trim($one);
						if (strlen($one) == 0) {
							// for pChart, when the value of point is missing, NULL means this point will be skip
							$this->_arrChdVal[$i][$j] = NULL;
						} else {
							$this->_arrChdVal[$i][$j] = floatval($one);
						}
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
		foreach ($this->_arrChdVal as $row) {
			$thismax = max($row);
			
			if ($thismax > $max) {
				$max = $thismax;
			}			
		}
		return $max;
	}
	
	public function getMinNum()
	{
		$min = 0;
		foreach ($this->_arrChdVal as $row) {
			$thismin = min($row);
			
			if ($thismin < $min) {
				$min = $thismin;
			}
		}
		return $min;
	}	
	
	public function getVal()
	{
		return $this->_arrChdVal;
	}
}
