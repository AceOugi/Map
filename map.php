<?php

$it = new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS);

foreach(new RecursiveIteratorIterator($it) as $file)
    if (preg_match('/\.php$/', $file))
        if ($result = json_decode(shell_exec('php '.__DIR__.'/map_file.php "'.$file.'"'), true))
            $map = array_merge_recursive($result, $map ?? []);

file_put_contents(($argv[2]??'.').'/routes.json', json_encode($map ?? []));
