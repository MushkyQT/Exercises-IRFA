<?php
function templateGen($template, $data)
{
    if (!file_exists($template)) {
        return "Card template not found, check path.";
    }
    if (is_array($data)) {
        extract($data);
    } else {
        return "Data not in array format.";
    }

    ob_start();
    include($template);
    return ob_get_clean();
}
