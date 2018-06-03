<?php

namespace TplApidoc;

class Markdown extends Doc implements IDoc {

    public function getTpl() {
        return file_get_contents(__DIR__.'/tpl/markdown.wiki');
    }

    protected function _return($v) {
        $pattern = "#@return\s\w*\s+(.*)\*/$#ims";
        preg_match($pattern, self::$_comment_string, $matches);
        return preg_replace('# *\* #', '', $matches[1]);
    }

    protected function _param($v) {
        return array_reduce($v, function($n, $v) {
            $n .= '| '.implode(' | ', $v).' |'.PHP_EOL;
            return $n;
        }, '');
    }

    protected function _name($v) {
        return $v[0][1];
    }

    protected function _method($v) {
        return $v[0][1];
    }

    protected function _description($v) {
        return $v[0][1];
    }

    protected function _path($v) {
        $class_name = str_replace('controller', '', strtolower($v['class']));
        $method_name = str_replace('action', '', strtolower($v['method']));
        return '/'.$class_name.'/'.$method_name;
    }
}
