<?php

/**
  *
����ֵ
��������ֵ��

chxl=
<����������ֵ>:|<����ֵ 1>|<����ֵ n>|
...
<����������ֵ>:|<����ֵ 1>|<����ֵ n> 

����������ֵָ����������ֵӦ�����ĸ������ᡣ��������ֵ������|�ָ

ע�⣺����������ֵ�����������С�

��һ������ֵ����Ϊ��������㣬���һ������ֵ��Ϊ�յ㣬�м�����ֵƽ���ֲ����������ϡ�

���磺http://chart.apis.google.com/chart?chxt=x,y,r,x&chxl=0:|Jan|July|Jan|July|Jan|1:|0|100|2:|A|B|C|3:|2005|2006|2007&cht=lc&chd=s:cEAELFJHHHKUju9uuXUc&chco=76A4FB&chls=2.0&chs=200x125

  */
class chxl
{
	private $_strChxl = null;
	private $_arrChxl = null;
	
	function __construct($strChxl = null)
	{
		$this->_strChxl = $strChxl;		
		$this->_strChxl = urldecode($this->_strChxl);
		$this->_strChxl = mb_convert_encoding($this->_strChxl, 'gbk', 'utf8');
		$this->parse();
	}
	
	private function parse()
	{
		if (!empty($this->_strChxl)) {
			$str = $this->_strChxl;
			$group = explode('|', $str);
			$groupLen = count($group);

			$lastIndex = 0;
			foreach ($group as $one) {
				if (substr($one, -1) == ':') {
					$lastIndex = intval(trim($one, ':'));
				} else {
					$this->_arrChxl[$lastIndex][] = $one; 
				}
			}
		}
	}

    public function getMaxStrLenOfChxl()
    {
        $maxStrLen = 0;
        if (empty($this->_arrChxl)) {
            return 0;
        }

        foreach ($this->_arrChxl[0] as $xl) {
            $maxStrLen = max($maxStrLen, mb_strlen($xl));
        }

        return $maxStrLen;
    }
	
	public function getVal()
	{
		return $this->_arrChxl;
	}	
}
