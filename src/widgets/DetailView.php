<?php

namespace sinus\semanticUI\widgets;

class DetailView extends \yii\widgets\DetailView
{
    public $options = ['class' => 'ui definition table'];
    public $template = '<tr><td>{label}</td><td>{value}</td></tr>';
}
