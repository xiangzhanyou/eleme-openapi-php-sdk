# PHP SDK 接入指南 & CHANGELOG

## 接入指南

  1. PHP version >= 5.4 & curl extension support
  2. 通过composer安装SDK
  3. 创建Config配置类，填入key，secret和sandbox参数
  4. 使用sdk提供的接口进行开发调试
  5. 上线前将Config中$sandbox值设为false以及填入正式环境的key和secret
 

### 安装

```php
    composer require eleme-openapi/eleme-openapi-sdk
```

### 基本用法

```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\Api\ShopService;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config和token对象，实例化一个服务对象
    $shop_service = new ShopService($token, $config);
    
    //调用服务方法，获取资源
    $shop = shop_service->get_shop(12345);

```

### Token获取
企业应用与个人应用的token获取方法略有不同。

实际使用过程中，在token获取成功后，该token可以使用较长一段时间，需要缓存起来，请勿每次请求都重新获取token。

#### 企业应用


```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\OAuth\OAuthClient;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config对象，实例化一个授权类
    $client = new OAuthClient($config);
    
    //根据OAuth2.0中的对应state，scope和callback_url，获取授权URL
    $auth_url = $client->get_auth_url($state, $scope, $callback_url);  
```

商家打开授权URL，同意授权后，跳转到您的回调页面，并返回code

```php
    //通过授权得到的code，以及正确的callback_url，获取token
    $token = $client->get_token_by_code($code, $callback_url);
```


#### 个人应用

```php
    use ElemeOpenApi\Config\Config;
    use ElemeOpenApi\OAuth\OAuthClient;
    
    //实例化一个配置类
    $config = new Config($app_key, $app_secret, false);
    
    //使用config对象，实例化一个授权类
    $client = new OAuthClient($config);
    
    //使用授权类获取token
    $token = $client->get_token_in_client_credentials();
```


### Demo使用方法

该demo主要用来演示企业应用的授权流程和展示应用信息

1. 在开发者中心创建企业应用，记下沙箱环境店铺的账号和密码，并在沙箱环境中填入回调地址（该地址需要https）

2. 找到demo文件夹将资源拷贝到您的项目目录
```
    vendor/eleme-openapi/eleme-openapi-sdk/demo/
```

3. 在init.php中修改沙箱环境的app_key，app_secret，callback_url，以及项目目录的相对路径

```php
    define("ROOT_DIR", dirname(__FILE__) . "your project path");
    
    $app_key = "your app key";
    $app_secret = "your app secret";
    $sandbox = true;

    $scope = "all";
    $callback_url = "your callback url";
```

4. 将demo部署到服务器上

5. 打开SDK生成的授权URL，使用沙箱店铺的账号和密码进行授权，成功后调转回调接口，输出页面，展示店铺信息

6. 使用沙箱店铺的账号密码在napos客户端登陆，会发现刚刚授权的应用已安装，并能够打开应用跳转回调页，展示店铺信息


## CHANGELOG:

### [1.10.0]

    Release Date : 2017-07-04

- [Feature] 新增了金融服务
- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 更新了店铺服务


### [1.9.0]

    Release Date : 2017-05-26

- [Feature] 更新了订单服务


### [1.8.0]

    Release Date : 2017-05-24

- [Feature] 更新了商户服务


### [1.7.0]

    Release Date : 2017-05-18

- [Feature] 更新了订单服务
- [Feature] 更新了商品服务


### [1.6.1]

    Release Date : 2017-05-12

- [Feature] 更新了订单服务
- [Feature] 更新了商品服务
- [Feature] 修复了demo的Util里，convert_to_message的json_decode有可能精度丢失的问题


### [v1.5.0]

    Release Date : 2017-5-8
    
- [Feature] 订单服务新增接口。
- [Feature] 商品服务新增接口。

### [v1.4.0]

    Release Date : 2017-5-5
    
- [Feature] 店铺服务新增接口。
- [Feature] 商品服务新增接口。
- [Feature] 新增签约服务。
    
    
### [v1.3.0]

    Release Date : 2017-4-25

- [Feature] 店铺服务新增接口。

### [v1.2.0]

    Release Date : 2017-4-21

- [Feature] 订单服务新增接口。
- [Feature] 商品服务新增接口。
- [Feature] 新增订单评论服务。

### [v1.1.10]

    Release Date : 2017-4-21

- [Feature] 修复了含有数组入参时，有可能造成的签名无效的问题。

### [v1.1.9]

    Release Date : 2017-4-14

- [Feature] 对部分字符集的入参进行了UTF8转换，修复了中文字符的签名有可能无法计算成功的问题。

### [v1.1.8]

    Release Date : 2017-4-11

- [BugFix] 修复了demo的HTML文件中，图片链接失效的问题

### [v1.1.7]

    Release Date : 2017-4-7

- [Feature] SDK完整实现
