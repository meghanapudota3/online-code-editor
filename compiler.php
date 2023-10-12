<?php
    $language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("$filepath 2>&1");
        echo $output;
    }

    if($language == "phython") {
        $output = shell_exec("$filepath");
        echo $output;
    }

    if($language == "node") {
        rename($filepath, $filepath.".js");
        $output = shell_exec("node $filepath.js 2>&1");
        echo $output;
    }

    if($language == "c") {
        $outputExe = $random . ".exe";
        shell_exec("gcc $filepath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    if($language == "cpp") {
        $outputExe = $random . ".exe";
        shell_exec("g++ $filepath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }