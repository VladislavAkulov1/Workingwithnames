<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

function getPartsFromFullname($strArr) {
  $result = array();
  foreach ($strArr as $str) {
    $words = explode(" ", $str);
    
   $chunks = array_chunk($words, 3); 
    foreach ($chunks as $chunk) {
      $result[] = implode(' ', $chunk); }
  }
  return $result;
}
$fullnames = array_column($example_persons_array, 'fullname');
$Text = getPartsFromFullname($fullnames);
print_r($Text);
function getFullnameFromParts($strArr) {
    $result = array();
    foreach ($strArr as $str) {
      $words = explode(" ", $str);
      $result[] = array(
        'surname' => $words[0],
        'name' => $words[1],
        'patronymic' => $words[2],
      );
    }
    return $result;
  }
  
$Text1 = getFullnameFromParts($fullnames);
print_r($Text1);

function getShortName($fullname) {
    $parts = explode(" ", $fullname);
    $surname = $parts[0];
    $name = $parts[1];
    $short_surname = mb_substr($surname, 0, 1, 'UTF-8') . '.';
    $short_name = $name . ' ' . $short_surname;
    return $short_name;
}

$fullnames = array_column($example_persons_array, 'fullname');
$short_names = array_map('getShortName', $fullnames);
print_r($short_names);

?>
