<?php
// Placeholder.php
// ~~~~~~~~~~~~~~~
// $VERSION = "2.12";
// ���� ���� �������� ��� �������� ������� ��� ��������� ������
// � SQL-��������� � ���������� �� PHP, � ����� ��������� 
// ������������ ��������.
//

// ��� ������ � sql_placeholder_ex() ������������ ������ � 
// ��������� ���� ���������.
@define("PLACEHOLDER_ERROR_PREFIX", "ERROR: ");

// function sql_compile_placeholder(string $tmpl)
// ��������� ������ ������� � ��������� ��������� ���� 
// placeholder-�� � ��� ��� ���������� ������� �����������.
// ���������� ��������� ����: 
// list(
//   list(
//     $key,    // ��� placeholder-�
//     $type,   // '@'|'%'|'#'|''
//     $start,  // ��������� placeholder-�
//     $length  // ����� placeholder-�
//   ),
//   $tmpl,     // �������� ������ �������
//   $has_named // ���� �� � ������� ����������� placeholder?
// )
function sql_compile_placeholder($tmpl) {
  $compiled  = array();
  $p         = 0;  // ������� ������� � ������
  $i         = 0;  // ������� placeholder-��
  $has_named = false;
  while (false !== ($start = $p = strpos($tmpl, "?", $p))) {
    // ���������� ��� placeholder-�.
    switch ($c = substr($tmpl, ++$p, 1)) {
      case '%': case '@': case '#':
        $type = $c; ++$p; break;
      default:
        $type = ''; break;
    }
    // ���������, ����������� �� ��� placeholder: "?keyname"
    if (preg_match('/^((?:[^\s[:punct:]]|_)+)/', substr($tmpl, $p), $pock)) {
      $key = $pock[1];
      if ($type != '#') $has_named = true;
      $p += strlen($key);
    } else {
      $key = $i;
      if ($type != '#') $i++;
    }
    // ��������� ������ � placeholder-�.
    $compiled[] = array($key, $type, $start, $p - $start);
  }
  return array($compiled, $tmpl, $has_named);
}


// bool sql_placeholder_ex(mixed $tmpl, array $args, string &$errormsg)
//
// �������� ��� placeholder-� � $tmpl �� �� SQL-�������������� �������� 
// �� $args. ��� ������ ��������� ��������������� ��������� � $errormsg.
//
// ��������� ���� placeholder-��:
//   ?  - ���������� �� ���� ��������� ��������.
//   ?@ - ���������� �� ������: 'a', 'b', ... (��������, ������ 
//        ������������ � ������� "SELECT ... WHERE id IN (?@)")
//   ?% - ���������� �� ������ ��� ����=��������: k1='v1', k2='v2', ... 
//        (������ ������������ � �������� "UPDATE ... SET ?%")
//
// Placeholder-� ����� ���� ������������: �� ��� ����� ��������� �����
// ����� ������������� ����, ��������: "?k", "?@k", "?%k".
//
// �������� $tmpl ����� ��������� �� ������ ��������� ������������� 
// �������, �� � ��������� ������ ������� sql_compile_placeholder(). 
// ��� ������, ���� ����� ��������� ��� ��������� SQL-������, �������
// ���� � ��� �� ������, �� ������ ���������.
//
// ���� � ������� ���� ���� �� ���� ����������� placeholder, 
// $args ������ ��������� ������ �� ������������� ��������. ����
// ������� ��� �������� ������������� ��������, ���������� ����� 
// placeholder-�� � ��������������� �� ��������.
//
// ���� ��� �����������  ��������� ������ (��������, �������������� 
// ����� placeholder-� � �������������� ��������, ������������ ���
// ��� ����� placeholder-� � �.�.), � �������������� ������ ������ 
// �������� placeholder-� ����������� ��������������� ���������. 
// ��� ���� ������� ���������� false, � ������������ "���������"
// ������ ���������� � ���������� $errormsg.
function sql_placeholder_ex($tmpl, $args, &$errormsg) {
  // ������ ��� ��������?.. ���� ���, ���������.
  if (is_array($tmpl)) {
    $compiled = $tmpl;
  } else {
    $compiled  = sql_compile_placeholder($tmpl);
  }

  list ($compiled, $tmpl, $has_named) = $compiled;

  // ���� ���� ���� �� ���� ����������� placeholder, ����������
  // ������ �������� � �������� �������������� �������.
  if ($has_named) $args = @$args[0];

  // ��������� ��� ������ � �����.
  $p   = 0;       // ������� ��������� � ������
  $out = '';      // �������������� ������
  $error = false; // ���� ������?

  foreach ($compiled as $num=>$e) {
    list ($key, $type, $start, $length) = $e;

    // Pre-string.
    $out .= substr($tmpl, $p, $start - $p);
    $p = $start + $length;

    $repl = '';   // ����� ��� ������ �������� placeholder-�
    $errmsg = ''; // ��������� �� ������ ��� ����� placeholder-�
    do {
      // ��� placeholder-���������?
      if ($type === '#') {
        $repl = @constant($key);
        if (NULL === $repl) 
          $error = $errmsg = "UNKNOWN_CONSTANT_$key";
        break;
      }
      // ������������ ������.
      if (!isset($args[$key])) {
        $error = $errmsg = "UNKNOWN_PLACEHOLDER_$key";
        break;
      }
      // ��������� �������� � ������������ � ����� placeholder-�.
      $a = $args[$key];
      if ($type === '') {
        // ��������� placeholder.
        if (is_array($a)) {
          $error = $errmsg = "NOT_A_SCALAR_PLACEHOLDER_$key";
          break;
        }
        $repl = preg_match('/^\d+$/', $a)? $a : "'".addslashes($a)."'";
        break;
      }
      // ����� ��� ������ ��� ������.
      if (!is_array($a)) {
        $error = $errmsg = "NOT_AN_ARRAY_PLACEHOLDER_$key";
        break;
      }
      if ($type === '@') {
        // ��� ������.
        foreach ($a as $v) 
          $repl .= ($repl===''? "" : ",")."'".addslashes($v)."'";
      } elseif ($type === '%') {
        // ��� ����� ��� ����=>��������.
        $lerror = array();
        foreach ($a as $k=>$v) {
          if (!is_string($k)) {
            $lerror[$k] = "NOT_A_STRING_KEY_{$k}_FOR_PLACEHOLDER_$key";
          } else {
            $k = preg_replace('/[^a-zA-Z0-9_]/', '_', $k);
          }
          $repl .= ($repl===''? "" : ", ").$k."='".@addslashes($v)."'";
        }
        // ���� ���� ������, ���������� ���������.
        if (count($lerror)) {
          $repl = '';
          foreach ($a as $k=>$v) {
            if (isset($lerror[$k])) {
              $repl .= ($repl===''? "" : ", ").$lerror[$k];
            } else {
              $k = preg_replace('/[^a-zA-Z0-9_-]/', '_', $k);
              $repl .= ($repl===''? "" : ", ").$k."=?";
            }
          }
          $error = $errmsg = $repl;
        }
      }
    } while (false);
    if ($errmsg) $compiled[$num]['error'] = $errmsg;
    if (!$error) $out .= $repl;
  }
  $out .= substr($tmpl, $p);

  // ���� �������� ������, ������������ �������������� ������
  // � ��������� �� ������ (����������� ��������������� ������
  // ������ ��������� placeholder-��).
  if ($error) {
    $out = '';
    $p   = 0;       // ������� �������
    foreach ($compiled as $num=>$e) {
      list ($key, $type, $start, $length) = $e;
      $out .= substr($tmpl, $p, $start - $p);
      $p = $start + $length;
      if (isset($e['error'])) {
        $out .= $e['error'];
      } else {
        $out .= substr($tmpl, $start, $length);
      }
    }
    // ��������� ����� ������.
    $out .= substr($tmpl, $p);
    $errormsg = $out;
    return false;
  } else {
    $errormsg = false;
    return $out;
  }
}


// function sql_placeholder(mixed $tmpl, $arg1 [,$arg2 ...])
//
// ���������: ��. �������� ������� sql_placeholder_ex() ����.
//
// ���������� �������������� ������ ����� ���� �����������. 
// � ������ ������ ������ ����� ��������� ������� "ERROR: ".
//
// ���� �� ����� ����������� ��������� ������, (��������, �������������� 
// �����), ��������� ������ �������� placeholder-�� ��������� ���������
// �� ������ � ���������� ������ � ��������� ����:
//   "ERROR: ������ � �������������� �����������".
// ����� ������, �������, ������� ������ ��� ������� ������ ����������.
// �� ����� ������ ���������������� ������������� ��������: ���� ���
// ���������� �� ������ "ERROR: ", ����������� ���������� ��������.
//
// ������ ����, ����� ������������ ������ � �������� ������� ���������,
// �� ������ �������� �������� ���� ������������� placeholder-�� ���� 
// �� �����.
//
// ���� �� � ������� ���� ���� �� ���� ����������� placeholder, ������� 
// ������� ��������� � �������� ��� ���������, ��� ������ - ��� ������,
// � ������ - ������������� ������ ��� ����������� �������� �����������
// placeholder-��.
function sql_placeholder() {
  $args = func_get_args(); 
  $tmpl = array_shift($args);
  $result = sql_placeholder_ex($tmpl, $args, $error);
  if ($result === false) return PLACEHOLDER_ERROR_PREFIX.$error;
  else return $result;
}


// function sql_pholder(mixed $tmpl, $arg1 [,$arg2 ...])
//
// ���������: ��. �������� ������� sql_placeholder() ����.
//
// ������� �������� ����� ��� ��, ��� sql_placeholder(), ������
// � ������ ������ ��� ���������� false � ���������� ��������������
// ������������ ����������, ��������� trigger_error().
function sql_pholder() {
  $args = func_get_args(); 
  $tmpl = array_shift($args);
  $result = sql_placeholder_ex($tmpl, $args, $error);
  if ($result === false) {
    $error = "Placeholder substitution error. Diagnostics: \"$error\"";
    if (function_exists("debug_backtrace")) {
      $bt = debug_backtrace();
      $error .= " in ".@$bt[0]['file']." on line ".@$bt[0]['line'];
    }
    trigger_error($error, E_USER_WARNING);
    return false;
  }
  return $result;
}

// ���������, ��� ����� ���������������� ��� ���������� ��������!
?>