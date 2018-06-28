<?php

namespace ElemeOpenApi\Api;

/**
 * 视频服务
 */
class ContentService extends RpcService
{

    /** 上传视频
     * @param $o_video_info 视频信息
     * @param $shop_id 店铺Id
     * @param $video_type 视频类型
     * @return mixed
     */
    public function upload_video($o_video_info, $shop_id, $video_type)
    {
        return $this->client->call("eleme.content.uploadVideo", array("oVideoInfo" => $o_video_info, "shopId" => $shop_id, "videoType" => $video_type));
    }

    /** 获取efs配置
     * @param $video_type 视频类型
     * @return mixed
     */
    public function get_efs_config($video_type)
    {
        return $this->client->call("eleme.content.getEfsConfig", array("videoType" => $video_type));
    }

    /** 通过视频id查询视频信息
     * @param $video_id 视频Id
     * @return mixed
     */
    public function get_video_info($video_id)
    {
        return $this->client->call("eleme.content.getVideoInfo", array("videoId" => $video_id));
    }

    /** 通过视频id获取所有相关联的业务关系
     * @param $video_id 视频Id
     * @return mixed
     */
    public function get_video_bind_info($video_id)
    {
        return $this->client->call("eleme.content.getVideoBindInfo", array("videoId" => $video_id));
    }

}