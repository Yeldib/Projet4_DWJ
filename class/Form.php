<?php

class Form
{
    private $data;
    public $surround = 'p';

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    private function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name, $type, $placeholder)
    {
        return $this->surround('<input id="lname" name="' . $name . '" type="' . $type . '" placeholder="' . $placeholder . '" class="form-control" value="' . $this->getValue($name) . '">');;
    }

    public function textArea($name, $placeholder)
    {
        return $this->surround('<textarea class="form-control" name="' . $name . '" placeholder="' . $placeholder . '" rows="7"></textarea>');
    }

    public function submit($name)
    {
        return $this->surround('<button type="submit" name="' . $name . '" class="btn btn-primary btn-lg">Envoyer</button>');
    }
}
