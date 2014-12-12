//@creation_date 7.06.07
//@modification_date 12.06.07
//@author Kornilov Ivan
//@document calendar.js
//скрипт календаря
//@version 0.1 
Show="visible";//переменная видимости слоя
fHide="hidden";//переменная скрытия слоя
var MonthNames = new Array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь","Декабрь");//массив месяцев текстовые эквиваленты
var nCurrentYear = 0;//текущий год
var nCurrentMonth = 0;//текущий месяц
var nWidth = 30;//ширина клетки
var nHeight = 20;//высота клетки
var leftX;//левая координата слоя
var rightX//правая координата слоя
var topY;//верхняя координата слоя
var bottomY;//нижняя координата слоя
function Calendar()//функция для прорисовки календаря
{
var HTMLstr = "";//строчка содержащая html-код
HTMLstr += "<table width='250px' cellspacing='0' cellpadding='0' border='2'>\n";
HTMLstr += "<tr><td bgcolor='darkblue'>\n";
HTMLstr += "\n";
HTMLstr += "<table border='0'  cols='3' width='100%'>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td><b><font color='white'>Год:</font></b></td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='right' width='80'>\n";
HTMLstr += "<a href=\"javascript:prevYear();\"><font face=verdana color='white' size=-2>Пред.</font></a>\n";//ссылка на предыдущий год
HTMLstr += "<a href=\"javascript:nextYear();\" ><font face=verdana color='white' size=-2>След.</font></a>\n";//ссылка на следующий год
HTMLstr += "</td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='left'>";
HTMLstr += "<div id='main' style='position: relative'>\n";//слой года
HTMLstr += "<font color='#99ffff'><b>1999</b></font>\n";
HTMLstr += "</div>\n";
HTMLstr += "</td>\n";
HTMLstr += "</tr>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td><b><font color='white'>Месяц:</font></b></td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='right'>\n";
HTMLstr += "<a href=\"javascript:prevMonth();\" ><font face=verdana color='white' size=-2>Пред.</font></a>\n";//ссылка на предыдущий месяц
HTMLstr += "<a href=\"javascript:nextMonth();\"><font face=verdana color='white' size=-2>След.</font></a>\n";//ссылка на следующий год
HTMLstr += "</td>\n";
HTMLstr += "\n";
HTMLstr += "<td align='left'>\n";
HTMLstr += "<div id='main2' style='position=relative;'>";//слой текущего месяца
HTMLstr += "<font color='#99ffff'><b>Декабрь</b></font>\n";
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
HTMLstr += "<td width='30'><b>Пн.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Вт.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Ср.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Чт.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Пт.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Сб.</b></td>\n";//день недели
HTMLstr += "<td width='30'><b>Вс.</b></td>\n";//день недели
HTMLstr += "</tr>\n";
HTMLstr += "<tr>\n";
HTMLstr += "<td colspan=7>\n";
HTMLstr += "<div style='position: relative;'>";//создание слоев чисел месяца
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
document.writeln(HTMLstr);//вывод результата
//document.writeln("<\/body><\/html>");
}
function printDay(day)//метод возвращающий значение даты
{
	/*var strDay=day.toString();//строковое представление номера дня
	var strMonth=nCurrentMonth.toString();//строковое представление номера месяца
	var strYear=nCurrentYear.toString();//строковое представление номера года
	if (strMonth.length==1){strMonth="0"+strMonth;}//если номер месяца состоит из одной цифры
	var date=strDay+"."+strMonth+"."+strYear;//составление даты
	window.opener.document.getElementById("there").value=date;//запись даты в текстовое поле
	window.close();//закрытие окна календаря*/
	var strDay=day.toString();//строковое представление номера дня
	var strMonth=nCurrentMonth.toString();//строковое представление номера месяца
	var strYear=nCurrentYear.toString();//строковое представление номера года
	if (strMonth.length==1){strMonth="0"+strMonth;}//если номер месяца состоит из одной цифры
	var date=strDay+"."+strMonth+"."+strYear;//составление даты
	window.returnValue=date;//запись даты в текстовое поле
	window.close();//закрытие окна календаря
}
function setCurrentMonth()//установка текущего месяца
{
date = new Date();
currentyear=date.getYear()
if (currentyear < 1000)//если текущий год меньше 1000
currentyear+=1900
setYearMonth(currentyear, date.getMonth()+1);
}
function setMonth(nMonth)//установка месяца
{
setYearMonth(nCurrentYear, nMonth);
}
function setYearMonth(nYear, nMonth)//установка месяца и года
{
nCurrentYear = nYear;
nCurrentMonth = nMonth;

var cross_obj= document.getElementById("main")//указатель на слой года
var cross_obj2= document.getElementById("main2")//указатель на слой месяца

cross_obj.innerHTML = "<font color=\"#99ffff\"><b>"+nCurrentYear+"</b></font>";//замена слоя
cross_obj2.innerHTML = "<font color=\"#99ffff\"><b>"+MonthNames[nCurrentMonth-1]+"</b></font>\n";//замена слоя
var date = new Date(nCurrentYear, nCurrentMonth-1, 1);//создание даты новой
var nWeek = 1;//номер недели
var nDate;//номер дня
while (date.getMonth() == nCurrentMonth-1)//пока равенство месяцев
{
//позиционирование слоев
nDate = date.getDate();
nLastDate = nDate;
var posDay = date.getDay()-1;
if (posDay == -1) posDay=6;//день недели выходит за границу допустимости
var posLeft = posDay*(nWidth+5)+5;
var posTop = (nWeek-1)*nHeight;
var cross_obj3=document.getElementById("idDate"+nDate).style
cross_obj3.left = posLeft;
cross_obj3.top = posTop;
if (date.getDay() == 0 || date.getDay() == 6)//если день- выходной
cross_obj3.color = "red";
else
cross_obj3.color = "black";
cross_obj3.visibility = "visible";
date = new Date(nCurrentYear, date.getMonth(), date.getDate()+1);
if (posDay == 6) nWeek++;//если день- воскресенье
}
for (++nDate; nDate <= 31; nDate++){//остальные дни скрыть
cross_obj3=document.getElementById("idDate"+nDate).style
cross_obj3.visibility = "hidden";
}
}
function nextMonth()//установка следущего месяца
{
nCurrentMonth++;
if (nCurrentMonth > 12)//если месяц больше 12го
{
nCurrentMonth -= 12;
nextYear();
}
setYearMonth(nCurrentYear, nCurrentMonth);//установка дня и месяца
}
function prevMonth()//установка предыдущий месяц
{
nCurrentMonth--;
if (nCurrentMonth < 1)//если месяц меньше 1го
{
nCurrentMonth += 12;
prevYear();
}
setYearMonth(nCurrentYear, nCurrentMonth);//установка дня и месяца
}
function prevYear()//установка предыдущего года
{
nCurrentYear--;
setYearMonth(nCurrentYear, nCurrentMonth);//установка дня и месяца
}
function nextYear()//установка следующего года
{
nCurrentYear++;
setYearMonth(nCurrentYear, nCurrentMonth);//установка дня и месяца
}
var cal = new Calendar();//сзоднаие календаря