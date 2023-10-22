<?php

namespace Helpers;

class RenderHelper {
    public static function converter(string $input): array {
        $command = 'python3 Converter/converter.py ' . escapeshellarg($input);
        exec($command, $display_value);
        return $display_value;
    }
}
?>