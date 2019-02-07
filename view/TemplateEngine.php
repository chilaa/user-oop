<?php

namespace view;

class TemplateEngine
{
    private $dir = ROOT . '/view/';
    private $view;
    private $data;


    public function render($view, $data = null)
    {
        $this->setView($view);
        if ($data) {
            $this->setData($data);
        }
        require_once $this->getDir().$this->getView();
    }

    /**
     * @return string
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param string $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}