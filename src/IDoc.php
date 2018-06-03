<?php

namespace TplApidoc;

interface IDoc {

    public function doc();
    public function getTpl();

    public function setSrc($path);
    public function setDst($path);

    public function getSrc();
    public function getDst();

}
