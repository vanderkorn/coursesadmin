<?php ## ���������� ������� ��� ������ � placeholder-���.

// result-set mysql_qw($connection_id, $query, $arg1, $arg2, ...)
//  - ��� -
// result-set mysql_qw($query, $arg1, $arg2, ...)
// ������� ��������� ������ � MySQL ����� ����������, �������� ���
// $connection_id (���� �� �������, �� ����� ��������� ��������).
// �������� $query ����� ��������� �������������� ����� ?,
// ������ ������� ����� ����������� ��������������� ��������
// ���������� $arg1, $arg2 � �.�. (�� �������), �������������� �
// ����������� � ���������.
function mysql_qw() {
  // �������� ��� ��������� �������.
  $args = func_get_args();
  // ���� ������ �������� ����� ��� "������", �� ��� ID ����������.
  $conn = null;
  if (is_resource($args[0])) $conn = array_shift($args);
  // ��������� ������ �� �������.
  $query = call_user_func_array("mysql_make_qw", $args);
  // �������� SQL-�������.
  return $conn!==null? mysql_query($query, $conn) : mysql_query($query);
}

// string mysql_make_qw($query, $arg1, $arg2, ...)
// ������ ������� ��������� SQL-������ �� ������� $query, 
// ����������� placeholder-�.
function mysql_make_qw() {
  $args = func_get_args();
  // �������� � $tmpl ������ �� ������ �������.
  $tmpl =& $args[0];
  $tmpl = str_replace("%", "%%", $tmpl);
  $tmpl = str_replace("?", "%s", $tmpl);
  // ����� ����� $args[0] ����� �������� ����������.
  // ������ ���������� ��� ���������, ����� �������.
  foreach ($args as $i=>$v) {
    if (!$i) continue;        // ��� ������
    if (is_int($v)) continue; // ����� ����� �� ����� ������������
    $args[$i] = "'".mysql_escape_string($v)."'";
  }
  // �� ������ ������ ��������� 20 ��������� ���������� �������������
  // ����������, ����� � ������, ���� ����� "?" ��������� ����������
  // ����������, ���������� ������ SQL-������� (������� ��� �������).
  for ($i=$c=count($args)-1; $i<$c+20; $i++) 
    $args[$i+1] = "UNKNOWN_PLACEHOLDER_$i";
  // ��������� SQL-������.
  return call_user_func_array("sprintf", $args);
}
?>