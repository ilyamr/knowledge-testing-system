<?php

namespace App\Helpers;


class Parsedown extends \Parsedown
{
    protected $InlineTypes = array(
        '"' => array('SpecialCharacter'),
        '!' => array('Image'),
        '&' => array(),
        '*' => array('Emphasis'),
        ':' => array('Url'),
        '<' => array('UrlTag', 'EmailTag', 'Markup', 'SpecialCharacter'),
        '>' => array('SpecialCharacter'),
        '[' => array('Link'),
        '_' => array(),
        '`' => array('Code'),
        '~' => array('Strikethrough'),
        '\\' => array(),
    );
}