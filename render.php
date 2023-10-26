<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $hashmap_json = file_get_contents("php://input");
        $hashmap = json_decode($hashmap_json, true);
        $display_format = $hashmap["display_format"];
        $output_str = "";
        $command = "python3 Converter/converter.py ".escapeshellarg($hashmap_json);
        exec($command, $output);
        
        if($display_format == "HTML"){
            $output_temp = str_replace("<", "&lt;", $output);
            $output_arr = str_replace(">", "&gt;", $output_temp);

            for($i = 0;$i < count($output_arr);$i++){                
                $output_str .= "<p>".$output_arr[$i]."</p>";
            }
        }
        else{
            for($i = 0;$i < count($output);$i++){
                $output_str .= $output[$i]."\n";
            }
        }
        echo $output_str;
    }
?>
