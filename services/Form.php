<?php

class Form
{
    private $data;
    public $surround = 'p';

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Retourne le tag HTML
     *
     * @param [type] $html
     */
    private function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * Retourne un champ input 
     *
     * @param string $name nom du champ
     * @param string $type type du champ (text, password, etc...)
     * @param string $placeholder
     * @return void
     */
    public function input($name, $type, $placeholder = "")
    {
        return $this->surround('<input required id="lname" name="' . $name . '" type="' . $type . '" placeholder="' . $placeholder . '" class="form-control" value="' . $this->getValue($name) . '">');
    }

    public function inputSession($name, $type, $value)
    {
        return $this->surround('<input required id="lname" name="' . $name . '" type="' . $type . '"  class="form-control" value="' . $value . '">');
    }

    public function textArea($name, $placeholder)
    {
        return $this->surround('<textarea required class="form-control" name="' . $name . '" placeholder="' . $placeholder . '" rows="7"></textarea>');
    }


    public function submit($name, $content)
    {
        return $this->surround('<button type="submit" name="' . $name . '" class="btn btn-success btn-md">' . $content . '</button>');
    }
}
