<?php

class DemoMethod extends DemoBase {
    /**
     * @name 测试method
     * @description 无
     * @param id int n 唯一id
     * @param name string n 姓名
     * @return json
     * // succ
     * {
     *    retcode: 2000000,
     *    msg: '操作成功'
     * }
     * // fail
     * {
     *    retcode: '错误编码',
     *    msg: '错误信息'
     * }
     */
    public function test() {
    }
}
