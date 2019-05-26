<?php

function auth($login, $passwd)
{
    $cd = __DIR__;
    $content_full = file_get_contents($cd."/private/passwd");
    $content = preg_split("/\n/", $content_full);
    $check_hash = hash("whirlpool", $passwd);
    foreach ($content as $line)
    {
        $tmp = unserialize($line);
        if ($tmp[0] == ($login))
            {
                if ($check_hash != $tmp[1])
                    return (FALSE);
                return (TRUE);
            }
    }
    return (FALSE);
}