<?php
function generateCard($cardTemplate, $cardData)
{
    if (!file_exists($cardTemplate)) {
        return "Card template not found, check path.";
    }
    if (is_array($cardData)) {
        extract($cardData);
    } else {
        return "Data not in array format.";
    }

    ob_start();
    include($cardTemplate);
    return ob_get_clean();
}
