<?php
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('text');

class JFormFieldFoo extends JFormFieldText
{
    protected $type = 'Foo';
}
