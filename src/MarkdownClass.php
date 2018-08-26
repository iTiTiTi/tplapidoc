<?php

namespace TplApidoc;

/**
 * 针对类注释
 */
class MarkdownClass extends DocClass implements IDoc {

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

    private static $orgin_dst = '';
    protected function _name($v) {
        if(!self::$orgin_dst) {
            self::$orgin_dst = $this->getDst();
        }
        $name = $v[0][1];
        $pos = iconv_strrpos(rtrim($name, '/'), '/');
        if($pos === false) {
            $this->setDst(self::$orgin_dst);
        } else {
            $this->setDst(self::$orgin_dst . DIRECTORY_SEPARATOR . iconv_substr($name, 0, $pos));
            $name = iconv_substr($name, $pos+1);
        }
        return $name;
    }

    protected function _test($v) {
        return $v[0][1];
    }

    protected function _prod($v) {
        return $v[0][1];
    }

    protected function _method($v) {
        return $v[0][1];
    }

    protected function _description($v) {
        return $v[0][1];
    }

    protected function _path($v) {
        return $v[0][1];
    }
}
