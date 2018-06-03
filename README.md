#### 概述
适用于php项目的 tplapidoc 是自动化文档接口生成工具。基于自定义模板生产api接口文档。

#### 安装 
```bash
$ mkdir /data1
$ cd /data1
$ composer require itititi/tplapidoc
```

#### 使用
普通方式
[usage] cmd src dst
示例：/data1/vendor/bin/tplapidoc /data1/src/Demo.php /data1/dst

建议写成shell脚本方便使用，如下：
```bash
$ vim apidoc.sh

#!/bin/bash

src=/data1/src/Demo.php
dst=/data1/dst/dst.wiki/接口文档
cmd=/data1/vendor/bin/tplapidoc 

cd $dst; find . ! -name '公共信息.md' -exec git rm {} \;
$cmd $src $dst

git add -A .
git commit -m '更新接口'; git push

```

#### 模板变量说明
解析接口来源文件
/data1/src/Demo.php
```php
<?php
class Demo extends A {
    /**
     * @name 测试
     * @description 无
     * @method POST
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
```

模板文件配置
/data1/vendor/itititi/tplapidoc/src/tpl/markdown.wiki
```bash
#### 接口名称
@name

#### 接口描述
@description

#### 基本信息
| 属性 | 内容 |
| -------- | -------- |
| Url | Path+@path |
| Method | @method |
| Charset | UTF-8 |

#### 请求参数
| 参数 | 类型 | 必传 | 备注 | 
| - | - | - | - | - |
@param

#### 结果返回
| 状态 | 内容 |
| -------- | -------- |
| succ/fail | 详见：response |

### response
@return
```

生成的文档文件
#### 接口名称
测试

#### 接口描述
无

#### 基本信息
| 属性 | 内容 |
| -------- | -------- |
| Url | Path+/demo/test |
| Method | POST |
| Charset | UTF-8 |

#### 请求参数
| 参数 | 类型 | 必传 | 备注 | 
| - | - | - | - | - |
| id | int | n | 唯一id |
| name | string | n | 姓名 |


#### 结果返回
| 状态 | 内容 |
| -------- | -------- |
| succ/fail | 详见：response |

### response
// succ
{
   retcode: 2000000,
   msg: '操作成功'
}
// fail
{
   retcode: '错误编码',
   msg: '错误信息'
}

#### 寄言
目前只实现了基于gitlab上wiki markdown语法格式。欢迎关注到该项目的同学贡献自己的一份力量。
