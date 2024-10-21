<?php
require 'vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Paragraph;

// Создание нового документа
$phpWord = new PhpWord();

// Добавление нового раздела
$section = $phpWord->addSection();
$paragraphStyle = new Paragraph();
$paragraphStyle->setAlignment('right');
// Добавление текста заявления
$section->addText(
    "Директору", null,
    $paragraphStyle
);

$section->addText(
    'Библиотеки им. Молчанова', null,
    $paragraphStyle
);

$section->addText(
    'от Сидорова Ивана Ивановича', null,
    $paragraphStyle
);

$section->addTextBreak(1); // Добавление пустой строки

$section->addText(
    'Заявление',
    array('name' => 'Arial', 'size' => 14, 'bold' => true),
    ['alignment' => 'center']

);

$section->addTextBreak(1); // Добавление пустой строки

$section->addText(
    'Прошу выдать мне читательский билет для пользования библиотечными ресурсами.',
    array('name' => 'Arial', 'size' => 12)
);

$section->addTextBreak(2); // Добавление двух пустых строк

// Добавление строки для подписи

$section->addText(
    '____________________                   ______________',
    array('name' => 'Arial', 'size' => 12)
);
$section->addText(
    'подпись                                           дата',
    array('name' => 'Arial', 'size' => 10)
);

// Сохранение документа
$filename = 'Zayavlenie_Sidorov.docx';
$writer = IOFactory::createWriter($phpWord, 'Word2007');
$writer->save($filename);

echo "Документ успешно создан: $filename";