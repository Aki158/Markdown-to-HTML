
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $received_data = $_POST["editor_content"];
        
        $command = 'python3 Converter/converter.py ' . escapeshellarg($received_data);
        exec($command, $output);
        
        $output_str = "";
        for($i = 0;$i < count($output);$i++){
            $output_str .= $output[$i]."\n";
        }
        echo $output_str;
        exit;
    }
?>