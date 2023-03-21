<?php
function doTheMagic($value): string
{
    if ($value === 'hello') {
        return 'Hello World';
    }
    return 0;
}
$value = (int)$_GET['value'];
echo doTheMagic($value);
