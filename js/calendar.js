//@creation_date 7.06.07
//@modification_date 12.06.07
//@author Kornilov Ivan
//@document calendar.js
//������ ���������
//@version 0.1 
Show="visible";//���������� ��������� ����
fHide="hidden";//���������� ������� ����
var MonthNames = new Array("������", "�������", "����", "������", "���", "����", "����", "������", "��������", "�������", "������","�������");//������ ������� ��������� �����������
var nCurrentYear = 0;//������� ���
var nCurrentMonth = 0;//������� �����
var nWidth = 30;//������ ������
var nHeight = 20;//������ ������
var leftX;//����� ���������� ����
var rightX//������ ���������� ����
var topY;//������� ���������� ����
var bottomY;//������ ���������� ����
function Calendar()//������� ��� ���������� ���������
{
var HTMLstr = "";//������� ���������� html-���
HTMLstr += "<table width='250px' cellspacing='0' cellpadding='0' border='2'>\n";
HTMLstr += "<tr><td bgcolor='darkblue'>\n";
HTMLstr += "\n";
HTMLstr += "<table border='0'  cols='3' width='100%'>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td><b><font color='white'>���:</font></b></td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='right' width='80'>\n";
HTMLstr += "<a href=\"javascript:prevYear();\"><font face=verdana color='white' size=-2>����.</font></a>\n";//������ �� ���������� ���
HTMLstr += "<a href=\"javascript:nextYear();\" ><font face=verdana color='white' size=-2>����.</font></a>\n";//������ �� ��������� ���
HTMLstr += "</td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='left'>";
HTMLstr += "<div id='main' style='position: relative'>\n";//���� ����
HTMLstr += "<font color='#99ffff'><b>1999</b></font>\n";
HTMLstr += "</div>\n";
HTMLstr += "</td>\n";
HTMLstr += "</tr>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td><b><font color='white'>�����:</font></b></td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='right'>\n";
HTMLstr += "<a href=\"javascript:prevMonth();\" ><font face=verdana color='white' size=-2>����.</font></a>\n";//������ �� ���������� �����
HTMLstr += "<a href=\"javascript:nextMonth();\"><font face=verdana color='white' size=-2>����.</font></a>\n";//������ �� ��������� ���
HTMLstr += "</td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='left'>\n";
HTMLstr += "<div id='main2' style='position=relative;'>";//���� �������� ������
HTMLstr += "<font color='#99ffff'><b>�������</b></font>\n";
HTMLstr += "<div>\n";
HTMLstr += "</td>\n";
HTMLstr += "\n";
HTMLstr += "</tr>\n";
HTMLstr += "</table>\n";
HTMLstr += "\n";
HTMLstr += "</td></tr>\n";
HTMLstr += "\n";
HTMLstr += "<tr height='160px'><td valign=\"top\">\n";
HTMLstr += "\n";
HTMLstr += "<table border=0 cols=7>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "<td width='30'><b>��.</b></td>\n";//���� ������
HTMLstr += "</tr>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td colspan=7>\n";
HTMLstr += "<div style='position: relative;'>";//�������� ����� ����� ������
for (var date=1; date <= 31; date++)
{
HTMLstr += " <div id=\"idDate"+date+"\" val="+date+" style=\"position: absolute; visibility: hidden\">\n";
HTMLstr += " <a href=\"javascript:printDay("+date+");\" ><b>"+date+"</b></a>\n";
HTMLstr += " </div>\n";
}

HTMLstr += "</div>";
HTMLstr += "</td></tr>\n";
HTMLstr += "</table>\n";
HTMLstr += "\n";
HTMLstr += "</td></tr>\n";
HTMLstr += "</table>\n";
document.writeln(HTMLstr);//����� ����������
//document.writeln("<\/body><\/html>");
}
function printDay(day)//����� ������������ �������� ����
{
	/*var strDay=day.toString();//��������� ������������� ������ ���
	var strMonth=nCurrentMonth.toString();//��������� ������������� ������ ������
	var strYear=nCurrentYear.toString();//��������� ������������� ������ ����
	if (strMonth.length==1){strMonth="0"+strMonth;}//���� ����� ������ ������� �� ����� �����
	var date=strDay+"."+strMonth+"."+strYear;//����������� ����
	window.opener.document.getElementById("there").value=date;//������ ���� � ��������� ����
	window.close();//�������� ���� ���������*/
	var strDay=day.toString();//��������� ������������� ������ ���
	var strMonth=nCurrentMonth.toString();//��������� ������������� ������ ������
	var strYear=nCurrentYear.toString();//��������� ������������� ������ ����
	if (strMonth.length==1){strMonth="0"+strMonth;}//���� ����� ������ ������� �� ����� �����
	var date=strDay+"."+strMonth+"."+strYear;//����������� ����
	window.returnValue=date;//������ ���� � ��������� ����
	window.close();//�������� ���� ���������
}
function setCurrentMonth()//��������� �������� ������
{
date = new Date();
currentyear=date.getYear()
if (currentyear < 1000)//���� ������� ��� ������ 1000
currentyear+=1900
setYearMonth(currentyear, date.getMonth()+1);
}
function setMonth(nMonth)//��������� ������
{
setYearMonth(nCurrentYear, nMonth);
}
function setYearMonth(nYear, nMonth)//��������� ������ � ����
{
nCurrentYear = nYear;
nCurrentMonth = nMonth;

var cross_obj= document.getElementById("main")//��������� �� ���� ����
var cross_obj2= document.getElementById("main2")//��������� �� ���� ������

cross_obj.innerHTML = "<font color=\"#99ffff\"><b>"+nCurrentYear+"</b></font>";//������ ����
cross_obj2.innerHTML = "<font color=\"#99ffff\"><b>"+MonthNames[nCurrentMonth-1]+"</b></font>\n";//������ ����
var date = new Date(nCurrentYear, nCurrentMonth-1, 1);//�������� ���� �����
var nWeek = 1;//����� ������
var nDate;//����� ���
while (date.getMonth() == nCurrentMonth-1)//���� ��������� �������
{
//���������������� �����
nDate = date.getDate();
nLastDate = nDate;
var posDay = date.getDay()-1;
if (posDay == -1) posDay=6;//���� ������ ������� �� ������� ������������
var posLeft = posDay*(nWidth+5)+5;
var posTop = (nWeek-1)*nHeight;
var cross_obj3=document.getElementById("idDate"+nDate).style
cross_obj3.left = posLeft;
cross_obj3.top = posTop;
if (date.getDay() == 0 || date.getDay() == 6)//���� ����- ��������
cross_obj3.color = "red";
else
cross_obj3.color = "black";
cross_obj3.visibility = "visible";
date = new Date(nCurrentYear, date.getMonth(), date.getDate()+1);
if (posDay == 6) nWeek++;//���� ����- �����������
}
for (++nDate; nDate <= 31; nDate++){//��������� ��� ������
cross_obj3=document.getElementById("idDate"+nDate).style
cross_obj3.visibility = "hidden";
}
}
function nextMonth()//��������� ��������� ������
{
nCurrentMonth++;
if (nCurrentMonth > 12)//���� ����� ������ 12��
{
nCurrentMonth -= 12;
nextYear();
}
setYearMonth(nCurrentYear, nCurrentMonth);//��������� ��� � ������
}
function prevMonth()//��������� ���������� �����
{
nCurrentMonth--;
if (nCurrentMonth < 1)//���� ����� ������ 1��
{
nCurrentMonth += 12;
prevYear();
}
setYearMonth(nCurrentYear, nCurrentMonth);//��������� ��� � ������
}
function prevYear()//��������� ����������� ����
{
nCurrentYear--;
setYearMonth(nCurrentYear, nCurrentMonth);//��������� ��� � ������
}
function nextYear()//��������� ���������� ����
{
nCurrentYear++;
setYearMonth(nCurrentYear, nCurrentMonth);//��������� ��� � ������
}
var cal = new Calendar();//�������� ���������