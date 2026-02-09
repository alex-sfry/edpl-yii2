<?php

namespace app\widgets\alext;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class SelectRelated extends \yii\bootstrap5\Widget
{
    public \yii\bootstrap5\ActiveForm|\yii\widgets\ActiveForm $form;
    public mixed $model;
    public string $attribute;
    public string $type = 'text';

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $html = '';

        $html .= $this->form->beginField($this->model, 'system_id', ['options' => ['class' => 'mb-3']]);
        $html .= '<div class="d-flex">';
        $html .= Html::activeLabel($this->model, 'system_id', ['class' => 'col-form-label text-nowrap me-2']); 
        $html .= Html::activeInput(
            $this->type,
            $this->model,
            'system_id', ['class' => 'form-control', 'readonly' => true]
        );

        $href = Url::to(["/system/select", "return" => Url::to(["/station/create"])]);
        $html .= '<a class="btn btn-secondary ms-1 text-nowrap" href="' . $href . '">select system</a>';
        $html .= '</div>';
        
        if ($this->model->hasErrors('system_id')) {
            $html .= '<div class="mt-1 text-danger">';
                $html .= '<small>' . e($this->model->getFirstError('system_id')) . '</small>';
            $html .= '</div>';
        }
        
        $html .= $this->form->endField();

        return $html;
    }
}
