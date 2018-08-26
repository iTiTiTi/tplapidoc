#### 环境
| 环境 | Domain |
| ---- | ---- |
| 测试环境 | https://www.demo1.com |
| 生产环境 | https://www.demo2.com |

#### 接口名称
测试class

#### 接口描述
无

#### 基本信息
| 属性 | 内容 |
| -------- | -------- |
| Url | Domain+/test/api/demo |
| Method | @method |
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
```javascript
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
 
```
