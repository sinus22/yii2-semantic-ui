<?php

namespace sinus\semanticUI\widgets;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use sinus\semanticUI\Elements;
use sinus\semanticUI\modules\Checkbox;
use sinus\semanticUI\modules\CheckboxList;
use sinus\semanticUI\modules\Dropdown;
use sinus\semanticUI\modules\RadioList;

class ActiveField extends \yii\widgets\ActiveField
{
    public $labelOptions = [];

    public $options = ['class' => 'field'];
    public $inputOptions = [];
    public $errorOptions = ['class' => 'ui red pointing label'];
    public $hintOptions = ['class' => 'ui pointing label'];
    public $iconOptions = [];

    public $template = "{label}\n{input}\n{hint}\n{error}";
    public $checkboxTemplate = '<div class="ui checkbox">{input}{label}{hint}{error}</div>';
    public $iconTemplate = '{label}<div class="ui left icon input">{icon}{input}</div>{hint}{error}';

    public function render($content = null)
    {
        $this->registerStyles();
        return parent::render();
    }

    public function registerStyles()
    {
        $classNamesToSelectors = function ($classNames) {
            return '.' . implode('.', preg_split('/\s+/', $classNames, -1, PREG_SPLIT_NO_EMPTY));
        };
        $this->form->getView()->registerCss('
        ' . $classNamesToSelectors($this->errorOptions['class']) . ' {
            display: none;
        }
        ' . $classNamesToSelectors($this->form->errorCssClass) . ' ' . $classNamesToSelectors($this->errorOptions['class']) . ' {
            display: inline-block;
        }
        ');
    }

    public function checkbox($options = [], $enclosedByLabel = true)
    {
        $this->parts['{label}'] = '';
        $this->parts['{input}'] = Checkbox::widget([
            'class' => Checkbox::className(),
            'model' => $this->model,
            'attribute' => $this->attribute,
            'options' => $options,
            'label' => Html::activeLabel($this->model, $this->attribute, $this->labelOptions)
        ]);
        return $this;
    }

    public function checkboxList($items, $options = [])
    {
        $this->parts['{input}'] = CheckboxList::widget([
            'class' => CheckboxList::className(),
            'model' => $this->model,
            'attribute' => $this->attribute,
            'items' => $items,
            'options' => $options
        ]);
        return $this;
    }

    public function radioList($items, $options = [])
    {
        $this->parts['{input}'] = RadioList::widget([
            'class' => RadioList::className(),
            'model' => $this->model,
            'attribute' => $this->attribute,
            'items' => $items,
            'options' => $options
        ]);
        return $this;
    }

    public function dropDownList($items, $options = [])
    {
        $multiple = ArrayHelper::remove($options, 'multiple', false);
        $upward = ArrayHelper::remove($options, 'upward', false);
        $compact = ArrayHelper::remove($options, 'compact', false);
        $disabled = ArrayHelper::remove($options, 'disabled', false);
        $fluid = ArrayHelper::remove($options, 'fluid', false);
        $search = ArrayHelper::remove($options, 'search', true);
        $defaultText = ArrayHelper::remove($options, 'defaultText', '');

        $this->parts['{input}'] = Dropdown::widget([
            'class' => Dropdown::className(),
            'model' => $this->model,
            'attribute' => $this->attribute,
            'items' => $items,
            'options' => $options,
            'search' => $search,
            'multiple' => $multiple,
            'upward' => $upward,
            'compact' => $compact,
            'disabled' => $disabled,
            'fluid' => $fluid,
            'defaultText' => $defaultText
        ]);
        return $this;
    }

    public function icon($icon=null,$options = [])
    {
        if ($icon === false) {
            $this->parts['{icon}'] = '';
            return $this;
        }
        $this->template=$this->iconTemplate;
        $options = array_merge($this->iconOptions, $options);


        $this->parts['{icon}'] = Elements::icon($icon,$options);

        return $this;
    }
}
