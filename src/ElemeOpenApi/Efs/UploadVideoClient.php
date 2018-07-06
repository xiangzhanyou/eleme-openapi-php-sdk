<?php
/**
 * Created by IntelliJ IDEA.
 * User: jiabinwang
 * Date: 7/5/18
 * Time: 8:46 PM
 */

namespace ElemeOpenApi\Efs;

use ElemeOpenApi\Api\ContentService;
use ElemeOpenApi\Config\Config;
use ElemeOpenApi\Exception\BusinessException;

class UploadVideoClient
{
    private $config;
    private $token;

    private $file_ext_list = array("MP4", "MOV");
    private $file_max_size = 200;

    public function __construct($token, Config $config)
    {
        $this -> config = $config;
        $this -> token = $token;
    }

    /**
     * 上传视频（封装ContentService中上传视频和获取efs配置接口）
     *
     * @param $file_path 视频文件本地地址
     * @param $title 视频标题
     * @param $desc 视频描述
     * @param $video_type 视频类型
     * @param $shop_id 店铺Id
     * @return mixed
     * @throws BusinessException 业务异常
     */
    public function upload_video_client($file_path, $title, $desc, $video_type, $shop_id) {
        $file_extension = strtoupper(pathinfo(basename($file_path), PATHINFO_EXTENSION));

        if (!in_array($file_extension, $this -> file_ext_list)) {
            throw new BusinessException("只支持mp4和mov格式的视频");
        }

        if (filesize($file_path) > $this -> file_max_size * 1024 * 1024) {
            throw new BusinessException("视频大小不能超过200M");
        }

        $video_file = fopen($file_path, "r");
        $key = $shop_id . "_" . time();

        $content_service = new ContentService($this -> token, $this -> config);
        $efs_config = $content_service -> get_efs_config($video_type);

        $efs_client = new EfsClient($efs_config);

        $version_id = $efs_client -> put_object($efs_config -> bucketName, $key, $video_file);

        $video_info = array(
            "videoKey" => $key,
            "versionId" => $version_id,
            "sizeInByte" => filesize($file_path),
            "title" => $title,
            "description" => $desc
        );

        return $content_service -> upload_video($video_info, $shop_id, $video_type);
    }

}