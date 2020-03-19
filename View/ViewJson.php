<?php

namespace View;

class ViewJson implements ViewInterface
{
    public function render($content)
    {
        header('Content-Type: application/json; charset=utf8');
        echo json_encode($content);
        return true;
    }
}
