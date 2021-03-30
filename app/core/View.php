<?php
class View
{
    public function generate($content_view, $pageData = null, $template_view = null)
    {
        $template_view = $template_view ?: ROOT . '/app/views/template_common.php';

        include $template_view;
    }
}