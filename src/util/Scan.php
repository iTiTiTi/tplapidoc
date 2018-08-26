<?php

namespace TplApidoc\util;

class Scan {
    /**
     * 存储类和方法列表
     * @var array[]
     */
    protected static $list = array();

    /**
     * 按照 rule 遍历目录中的类和方法
     *
     * @todo 相同的dir，不同的rule的处理，速度很慢，需要做cache
     *
     * @param $dir
     * @return array
     * @throws Exception
     */
    public static function classes($dir, $deeplimit=20) {
        $dir = self::filter($dir);

        // 目录的文件列表
        $ls = array();
        foreach ($dir as $d) {
            $ls = array_merge($ls, scan\File::filelist($d, $deeplimit));
        }
        return $ls;
    }

    /**
     * @param $dir
     * @return array
     * @throws Exception
     */
    private static function filter($dir) {
        $dirs = array();
        if (is_array($dir)) {
            foreach ($dir as $d) {
                if (!is_dir($d)) {
                    throw new \Exception('Not a directory: '.$d, -1);
                }
                $dirs[] = $d;
            }
        } else {
            if (!is_dir($dir)) {
                throw new \Exception('Not a directory: '.$dir, -1);
            }
            $dirs[] = $dir;
        }

        sort($dirs);

        return $dirs;
    }
}
