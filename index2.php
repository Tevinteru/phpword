<?php
require 'vendor/autoload.php';


$phpWord = new \PhpOffice\PhpWord\PhpWord();
use PhpOffice\PhpWord\IOFactory;

// Define styles
$multipleTabsStyleName = 'multipleTab';
$phpWord->addParagraphStyle(
    $multipleTabsStyleName,
    [
        'tabs' => [
            new \PhpOffice\PhpWord\Style\Tab('left', 1550),
            new \PhpOffice\PhpWord\Style\Tab('center', 3200),
            new \PhpOffice\PhpWord\Style\Tab('right', 5300),
        ],
    ]
);

$rightTabStyleName = 'rightTab';
$phpWord->addParagraphStyle($rightTabStyleName, ['tabs' => [new \PhpOffice\PhpWord\Style\Tab('right', 9090)]]);

$leftTabStyleName = 'centerTab';
$phpWord->addParagraphStyle($leftTabStyleName, ['tabs' => [new \PhpOffice\PhpWord\Style\Tab('center', 4680)]]);

// New portrait section
$section = $phpWord->addSection();

// Add listitem elements
$section->addText("Multiple Tabs:\tOne\tTwo\tThree", null, $multipleTabsStyleName);
$section->addText("Left Aligned\tRight Aligned", null, $rightTabStyleName);
$section->addText("\tCenter Aligned", null, $leftTabStyleName);

$filename = 'test.docx';
$writer = IOFactory::createWriter($phpWord, 'Word2007');
$writer->save($filename);
