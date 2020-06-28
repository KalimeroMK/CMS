<?php
class DisableSimplePieSanitize extends SimplePie_Sanitize
{
    public function sanitize($data, $type, $base = '')
    {
        return $data;
    }
}
