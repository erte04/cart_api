<?php

namespace View;

class ViewHtml implements ViewInterface
{
    public function render($content)
    {
        header('Content-Type: application/x-www-form-urlencoded; charset=utf8');
        echo json_encode($content);
        return true;
    }
}
