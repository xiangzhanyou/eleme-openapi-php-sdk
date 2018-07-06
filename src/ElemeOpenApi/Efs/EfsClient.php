<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiabinwang
 * Date: 7/5/18
 * Time: 8:13 PM
 */

namespace ElemeOpenApi\Efs;

//require '../../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use ElemeOpenApi\Exception\ServiceException;

class EfsClient
{
    private $efs_address;
    private $key;
    private $secret;
    private $token;
    private $s3;
    private $bucket;

    public function __construct($efs_config)
    {
        $this -> efs_address = $efs_config -> efsAddress;
        $this -> key = $efs_config -> credentials -> accessKeyId;
        $this -> secret = $efs_config -> credentials -> secretAccessKey;
        $this -> token = $efs_config -> credentials -> sessionToken;
        $this -> bucket = $efs_config -> bucketName;
        $this -> s3 = $this -> init();
    }

    /**
     * efs s3客户端初始化
     *
     * @return S3Client
     */
    private function init() {
        return new S3Client([
            'endpoint' => $this -> efs_address,
            'use_path_style_endpoint' => true,
            'version' => 'latest',
            'region'  => 'eleme',
            'credentials' => [
                'key' => $this -> key,
                'secret' =>  $this -> secret,
                'token' => $this -> token,
            ]
        ]);
    }

    /**
     * efs文件上传
     *
     * @param $bucket
     * @param $keyname
     * @param $file
     * @return mixed
     */
    public function put_object($bucket, $keyname, $file) {
        try {
            $result = $this -> s3 -> putObject([
                'Bucket' => $bucket,
                'Key'    => $keyname,
                'Body'   => $file
            ]);
            return $result['VersionId'];
        } catch (S3Exception $e) {
            throw new ServiceException($e ->getMessage());
        }
    }
}