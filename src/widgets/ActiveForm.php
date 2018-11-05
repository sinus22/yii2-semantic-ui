<?php

namespace sinus\semanticUI\widgets;

use yii\helpers\Html;

class ActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = 'sinus\semanticUI\widgets\ActiveField';
    public $options = ['class' => 'ui form'];
    public $errorCssClass = 'error';
    public $successCssClass = 'success';

    /**
     * @var string
     */
    public $size;

    /**
     * @var bool
     */
    public $inverted = false;

    public function init()
    {
        if ($this->size) {
            Html::addCssClass($this->options, $this->size);
        }

        if ($this->inverted === true) {
            Html::addCssClass($this->options, 'inverted');
        }
        parent::init();
    }
}
