<h1>1.  tencentchart��������</h1>

<h2>1.1  ʲô�� Google Chart API��</h2>
<blockquote>
Google Chart API ��һ��䷽���ͼ�����ɹ��ߣ�����������ҳ��ֱ��Ƕ��ͼ��ͼƬ��ͼ�����ݺͲ���ͨ�� HTTP �����ͣ�Google ���մ����󷵻� PNG ��ʽ��ͼ��ͼƬ��Google Chart API ֧�ֶ���ͼ�����ͣ�������ʹ�� img ��ǩ��ͼ��ֱ��Ƕ����ҳ��<br>
����google chart api�������Բο��˴���<a href="http://labs.cloudream.name/google/chart/api.html" target=_blank>http://labs.cloudream.name/google/chart/api.html</a>
</blockquote>

<h2>1.2  ʲô�� Tencent Chart API��</h2>
<blockquote>
Tencent Chart API���з���Ӫ����Ӫ���Ŀ�����һ�����Google Chart APIЭ��Ļ�ͼ�������Ŀ���ڿ����У�Ŀǰ����Google Chart API����Э�顣�����ͼ(p/p3)����״ͼ(bvs)������ͼ(lc)��ɢ��ͼ(s)��֧��chs��chd��cht��chtt��chco��chdl��chxl�Ȳ�����
</blockquote>

<h2>1.3  php����ʾ��</h2>
<blockquote>
<pre>
function testPie()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=p&chs=300x200"
		 . "&chd=t:20,80,10,23"
		 . "&chl=hello|world"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "&lt;a href=$url&gt;&lt;img src=$url&gt;&lt;/a&gt;\n";
}
</pre>
</blockquote>

<h2>1.3  ����ʹ�������������⣬˭���԰����ң�</h2>
<blockquote>
�������ʹ��tencent chart api�Ĺ��������������⣬�����뵽һЩidea������ʱ�����ǵĿ����Ŷ���ϵ��jamesqin@tencent.com
</blockquote>

<h1>2.  ����</h1>
<?php

function testPie()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=p&chs=300x200"
		 . "&chd=t:20,80,10,23"
		 . "&chl=hello|world"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testPie3D()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=p3&chs=400x200"
		 . "&chd=t:20,80,10,23"
		 . "&chl=May|Jun|Jul|Aug|Sep|Oct"
		 . "&chtt=" . urlencode(mb_convert_encoding('��������ո�+��+������|���Ǹ�����', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testBvs()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=bvs&chs=300x200"
		 . "&chd=t:200,50,60,80,40|50,60,100,40,20"
		 . "&chco=4d89f9,c6d9fd"
		 . "&chdl=sz|" . urlencode(mb_convert_encoding('����', 'utf8', 'gbk'))
		 . "&chbh=20&chxl=0:|05-04|05-05|05-06|05-07|05-08"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testBvs2()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=bvs&chs=300x200"
		 . "&chd=t:200,50,60,80,40"
		 . "&chco=4d89f9"
		 . "&chdl=sz|bj"
		 . "&chbh=20&chxl=0:|05-04|05-05|05-06|05-07|05-08"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testBvg()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=bvg&chs=300x200"
		 . "&chd=t:200,50,60,80,40|50,60,100,40,20"
		 . "&chco=4d89f9,c6d9fd"
		 . "&chdl=sz|" . urlencode(mb_convert_encoding('����', 'utf8', 'gbk'))
		 . "&chbh=20&chxl=0:|05-04|05-05|05-06|05-07|05-08"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testLc()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=lc&chs=300x200"
		 . "&chd=t:200,50,60,80,40|50,60,100,40,20"
		 . "&chco=0000ff,ff0000"
		 . "&chdl=sz|bj"
		 . "&chxl=0:|05-04|05-05|05-06|05-07|05-08"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

function testS()
{
	$url = "/tencentchart/chart.php"
		 . "?cht=s&chs=300x200"
		 . "&chd=t:200,50,60,80,40|50,60,100,40,20"
		 . "&chco=ff0000"
		 . "&chdl=sz|bj"
		 . "&chtt=" . urlencode(mb_convert_encoding('���ı���', 'utf8', 'gbk'));
	echo "<a href=$url><img src=$url></a>\n";
}

testPie(); testPie3D(); echo "<br>\n";
testBvs(); testBvs2(); echo "<br>\n";
testBvg(); echo "<br>\n";
testLc(); echo "<br>\n";
testS(); echo "<br>\n";
