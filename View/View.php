<?php

namespace View;

class View implements ViewFactory
{

    public function createView($type = 'json')
    {
        if ($type === 'json') {
            return new ViewJson();
        } elseif ($type === 'html') {
            return new ViewHtml();
        }
    }
}
