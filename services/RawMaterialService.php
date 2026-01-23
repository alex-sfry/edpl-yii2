<?php


namespace app\services;

use app\models\RawMaterial;

class RawMaterialService extends \yii\base\Model
{
    /**
     * @var \app\models\PlanetMaterial[]
     */
    public $models;
    /**
     * @var bool
     */
    public $hasErrors;

    /**
     * @param array
     * @return void
     */
    public function validateModels($post)
    {
        foreach ($post['material_id'] as $key => $value) {
            if (!$value) {
                continue;
            }

            $model = new RawMaterial();
            $model->planet_id = $post['planet_id'];
            $model->material_id = $value;
            $model->material_percentage = $post['material_percentage'][$key];
            $this->models[] = $model;

            if (!$model->validate()) {
                $this->hasErrors = true;
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function saveMaterials()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            foreach ($this->models as $model) {
                $model->save(false);
            }

            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }
}
