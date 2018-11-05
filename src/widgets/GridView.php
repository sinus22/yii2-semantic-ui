<?php

namespace sinus\semanticUI\widgets;

class GridView extends \yii\grid\GridView
{
    /**
     * @var array
     */
    public $tableOptions = ['class' => 'ui table'];

    /**
     * @var string
     */
    public $dataColumnClass = 'sinus\semanticUI\widgets\DataColumn';

    /**
     * @var array
     */
    public $pager = ['class' => 'sinus\semanticUI\widgets\LinkPager'];
}
