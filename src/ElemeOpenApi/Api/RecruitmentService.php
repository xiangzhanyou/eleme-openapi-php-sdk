<?php

namespace ElemeOpenApi\Api;

/**
 * 招聘市场服务
 */
class RecruitmentService extends RpcService
{

    /** 简历回传
     * @param $resume 简历信息
     * @return mixed
     */
    public function upload_resume($resume)
    {
        return $this->client->call("eleme.recruitment.uploadResume", array("resume" => $resume));
    }

    /** 职位状态变更
     * @param $position_id 职位id
     * @param $status 变更状态
     * @return mixed
     */
    public function update_job_position_status($position_id, $status)
    {
        return $this->client->call("eleme.recruitment.updateJobPositionStatus", array("positionId" => $position_id, "status" => $status));
    }

    /** 简历状态变更
     * @param $resume_id 职位id
     * @param $status 变更状态
     * @return mixed
     */
    public function update_resume_status($resume_id, $status)
    {
        return $this->client->call("eleme.recruitment.updateResumeStatus", array("resumeId" => $resume_id, "status" => $status));
    }

}