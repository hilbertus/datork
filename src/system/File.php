<?php


namespace datork\system;


class File
{

    /**
     * Deletes files if they exist, otherwise do nothing
     * @param string[] $paths
     */
    public static function delete($paths)
    {
        foreach ($paths as $path){
            if(!is_file($path)){
                continue;
            }
            unlink($path);
        }
    }
}