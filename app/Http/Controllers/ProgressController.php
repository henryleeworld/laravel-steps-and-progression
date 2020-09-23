<?php

namespace App\Http\Controllers;

use Mtownsend\Progress\Progress;
use Mtownsend\Progress\Step;

class ProgressController extends Controller
{
    /**
     * Step.
     *
     * @return void
     */
    public function step()
    {
        $step1 = (new Step('https://github.com/henryleeworld', 'Github Site'))->url();
        $step2 = (new Step('北極程式碼保險櫃貢獻者', 'Highlights'))->string();
        $progress = (new Progress($step1, $step2));
        echo '總步驟數：' . $progress->get()['total_steps'] . PHP_EOL;
		echo '完成百分比：' . $progress->get()['percentage_complete'] . PHP_EOL;
		echo '未完成百分比：' . $progress->get()['percentage_incomplete'] . PHP_EOL;
		echo '步驟完成數：' . $progress->get()['steps_complete'] . PHP_EOL;
		echo '步驟未完成數：' . $progress->get()['steps_incomplete'] . PHP_EOL;
        if (count($progress->get()['complete_step_names'])) {
            echo '步驟完成內容：' . PHP_EOL;
        }
        foreach ($progress->get()['complete_step_names'] as $key => $name) {
		    echo '步驟完成名稱' . ($key + 1) . '：' . $name . PHP_EOL;
        }
        if (count($progress->get()['incomplete_step_names'])) {
            echo '步驟未完成內容：' . PHP_EOL;
        }
        foreach ($progress->get()['incomplete_step_names'] as $key => $name) {
		    echo '步驟未完成名稱' . ($key + 1) . '：' . $name . PHP_EOL;
        }
    }
}
