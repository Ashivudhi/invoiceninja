<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Factory;

use App\Models\TaskStatus;

class TaskStatusFactory
{
    public static function create(int $company_id, int $user_id) :TaskStatus
    {
        $task_status = new TaskStatus;
        $task_status->user_id = $user_id;
        $task_status->company_id = $company_id;
        $task_status->name = '';
        
        return $task_status;
    }
}
