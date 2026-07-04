<?php
$title = 'Quitz PD_411';
const ROOT = __DIR__ . '\\..';
//const LOGIN_STYLE_PATH = $_SERVER['DOCUMENT_ROOT'] . '\\04-Quitz\\css\\login.css';
//const QUITZ_STYLE_PATH = $_SERVER['DOCUMENT_ROOT'] . '\\04-Quitz\\css\\quitz.css';

$questions =
    [
        'Кто создал игру Max Payne?',
        'На каком движке создана игра Crysis 2?',
        'Как зовут главного персонажа Vice City?',
        'В каком году вышла GTA-V?',
        'На каком движке разработана GTA-V?'
    ];

$answers =
    [
        ['Bethesda', 'Crytek', 'Rockstar', 'Remady'],
        ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'],
        ['Max Payne', 'Tommy Vercetty', 'Ricardo Diaz'],
        ['2003', '2012', '2013', '2015'],
        ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'],
    ];

$correct_answers =
    [
        3,
        0,
        1,
        2,
        3
    ];
?>