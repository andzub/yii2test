<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;


class TestController extends Controller
{

    private $server = 'http://api.ias.brdo.com.ua/v1_1/inspections?apiKey=360d858edaac8313a73d237f340138c097ab6304';

    public function actionIndex()
    {
        $dataJson = file_get_contents($this->server);
        $data = json_decode($dataJson);
        if ($data->status == 'success') {

            // Last 100 records
            $dataSlice = array_slice($data->items, -100, 100);

            // Insert to test table
            foreach ($dataSlice as $data) {
                \Yii::$app->db->createCommand()->insert('test', [
                    'internal_id' => $data->internal_id,
                    'last_modify' => $data->last_modify,
                    'regulator' => $data->regulator
                ])->execute();
            }

            echo "success \n";

            return ExitCode::OK;
        }

        var_dump($data);exit;
    }
}
