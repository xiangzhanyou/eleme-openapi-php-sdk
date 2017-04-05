# PHP SDK 接入指南 & CHANGELOG

## 接入指南
  1. PHP version >= 5.4 & curl extension support
  2. 初始化Config配置类，填入key，secret和sandbox参数
  3. 使用sdk提供的接口进行开发调试
  4. 上线前将config.php中$sandbox值设为false以及填入正式环境的key和secret以及callback_url
 

## 代码示例

### 企业应用

  - 第一步 引入sdk和配置文件
  
```php
    require dirname(__FILE__)."/../library/include.php";
```
 
  - 第二步 实例化一个oauth2.0客户端授权模式的授权对象
  
```php
    $client = new OAuthClient(APP_KEY, APP_SECRET, CALLBACK_URL);
```

  - 第三步 获取生成授权url

```php
    $auth_url = $client->get_auth_url($state, $scope);
```

  - 第四步 在授权url中同意授权后，会跳转到CALLBACK_URL的页面，在通过链接上的参数，获取授权码code

  - 第五步 通过code获取Token对象，此步获取到的token对象可在有效期内一直使用，不用每次调用前都去获取一次，建议应用授权一次后存放到全局缓存中


```php
    $token = $client->get_token_by_code($code);
```

  - 第六步 实例化远程调用的rpcClient对象

```php
    $rpc_client = new RpcClient($result->access_token, APP_KEY, APP_SECRET, API_SERVER_URL);
```

  - 第七步 实例化一个服务对象

```php
    $shop = new ShopService($rpc_client);
```

  - 第八步 调用服务方法，获取资源数据

```php
    $info = $shop->get_shop(123456);
```

  - 第九步 如果token过期，通过refresh_token换取新的token

```php
    $token = $client->get_token_by_refresh_token($refresh_token, $scope);
```

### 个人应用


  - 第一步 引入sdk和配置文件

```php
    require dirname(__FILE__)."/../library/include.php";
```

  - 第二步 实例化一个oauth2.0客户端授权模式的授权对象

```php
    $client = new OAuthClient(APP_KEY, APP_SECRET, CALLBACK_URL);
```

  - 第三步 获取Token对象，此步获取到的token对象可在有效期内一直使用，不用每次调用前都去获取一次，建议应用授权一次后存放到全局缓存中


```php
    $token = $client->get_token_by_code($code);
```

  - 第四步 实例化远程调用的rpcClient对象

```php
    $rpc_client = new RpcClient($token, APP_KEY, APP_SECRET, API_SERVER_URL);
```

  - 第五步 实例化一个服务对象

```php
    $shop = new ShopService($rpc_client);
```

  - 第六步 调用服务方法，获取资源数据

```php
    $info = $shop->get_shop(123456);
```

## CHANGELOG:

### [v1.0.0]

    Release Date : 2017-xx-xx

- [Feature] sdk完整实现