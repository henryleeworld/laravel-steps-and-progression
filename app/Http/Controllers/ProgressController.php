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
        $step1 = (new Step('https://github.com/henryleeworld', __('Github Site')))->url();
        $step2 = (new Step(__('Arctic Code Vault Contributor'), __('Highlights')))->string();
        $progress = (new Progress($step1, $step2));
        echo __('Total steps: ') . $progress->get()['total_steps'] . PHP_EOL . PHP_EOL;
		echo __('Percentage complete: ') . $progress->get()['percentage_complete'] . PHP_EOL;
		echo __('Percentage incomplete: ') . $progress->get()['percentage_incomplete'] . PHP_EOL . PHP_EOL;
		echo __('Steps complete: ') . $progress->get()['steps_complete'] . PHP_EOL;
		echo __('Steps incomplete: ') . $progress->get()['steps_incomplete'] . PHP_EOL . PHP_EOL;
        if (count($progress->get()['complete_step_names'])) {
            echo __('Complete step contents: ') . PHP_EOL;
        }
        foreach ($progress->get()['complete_step_names'] as $key => $name) {
		    echo __('Complete step names') . ' ' . ($key + 1) . __('： ') . $name . PHP_EOL;
        }
        if (count($progress->get()['incomplete_step_names'])) {
            echo PHP_EOL;
            echo __('Incomplete step contents: ') . PHP_EOL;
        }
        foreach ($progress->get()['incomplete_step_names'] as $key => $name) {
		    echo __('Incomplete step names') . ' ' . ($key + 1) . '：' . $name . PHP_EOL;
        }
    }
}
