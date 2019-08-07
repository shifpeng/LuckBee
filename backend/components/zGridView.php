<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/1/17
 * Time: 19:08
 */

namespace backend\components;

use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Html;
use yii\widgets\LinkPager;

/**
 * Class zGridView
 *
 * @property bool|array $pagerButtons
 * @package common\components
 */
class zGridView extends GridView
{
    public $pagerFixed = false; //分页是否保持在底部不动
    public $pagerButtons = [];        //分页同一行的按钮
    public $pageSummaryRowOptions = ['class' => 'kv-page-summary'];
    public $summaryOptions = ['class' => 'zPager'];
    public $showEmpty = false;  //为空时，是否显示信息
    public $emptyTextOptions = ['class' => 'empty text-center'];
    public $zSummary = [];          //汇总数据，
    public $layout = "{zSummary}\n{items}\n{pager}";
    public $dataCount;      //当前页记录数量
    public $dataTotalCount;         //总记录数
    public $resizableColumns = false;

    public function renderTableBody()
    {
        $tmp = $this->showPageSummary;
        $this->showPageSummary = false;
        $content = $this::zTableBody();
        $this->showPageSummary = $tmp;
        if ($this->showPageSummary) {
            return $this->renderPageSummary() . $content;
        }
        return $content;
    }

    //为空时，不显示任何数据
    public function zTableBody()
    {
        $models = array_values($this->dataProvider->getModels());
        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach ($models as $index => $model) {
            $key = $keys[$index];
            if ($this->beforeRow !== null) {
                $row = call_user_func($this->beforeRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }

            $rows[] = $this->renderTableRow($model, $key, $index);

            if ($this->afterRow !== null) {
                $row = call_user_func($this->afterRow, $model, $key, $index, $this);
                if (!empty($row)) {
                    $rows[] = $row;
                }
            }
        }

        if (empty($rows) && $this->emptyText != '') {
            $colspan = count($this->columns);

            return "<tbody>\n<tr><td colspan=\"$colspan\">" . $this->renderEmpty() . "</td></tr>\n</tbody>";
        } else {
            return "<tbody>\n" . implode("\n", $rows) . "\n</tbody>";
        }
    }

    /**
     * User: wangxj
     *
     * 禁用kartik加载bootstrap的class
     *
     */
    protected function initBootstrapStyle()
    {
        if ($this->striped) {
            Html::addCssClass($this->tableOptions, 'table table-striped table-bordered table-zFixed table-responsive');
        }

    }

    /**
     * 重写分页. 左侧有按钮，固定在页面底部，需要引用ui.css
     * @return string the rendering result
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        $pagerHtml = '';
        $this->dataCount = $this->dataProvider->getCount();
        $this->dataTotalCount = $this->dataProvider->getTotalCount();
        if ($pagination === false || $this->dataCount <= 0) {
            //如果有功能按钮，没有分页也要显示
            if (!empty($this->pagerButtons) || $this->summary) {
                $pagerHtml = $this->renderPagerButton() . $pagerHtml;
            }
            return '<div class="bottom_nav">' . $pagerHtml . '</div>';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        $pager['nextPageLabel'] = '';
        $pager['prevPageLabel'] = '';
//        $pager['linkOptions'] = ['class'=> 'icon-right'];
        $pagerHtml = $class::widget($pager);
        //如果有按钮
        if (!empty($this->pagerButtons)) {
            $pagerHtml = $this->renderPagerButton() . $pagerHtml;
        } else {
            $pagerHtml = $this->renderPagerGo() . $this->renderSummary() . $pagerHtml;
        }

        //如果需要固定
        if ($this->pagerFixed) {
            $pagerHtml = '<div class="bottom_nav">' . $pagerHtml . '</div>';
        }
        return $pagerHtml;
    }

    protected function renderPagerButton()
    {
        $buttonHtml = '<div style="display: inline-block; margin:14px 0;" >';
        foreach ($this->pagerButtons as $pagerButton) {
            $buttonHtml .= ' ' . $pagerButton;
        }
        $buttonHtml .= '</div>';
        $buttonHtml .= $this->renderPagerGo() . $this->renderSummary();
        return $buttonHtml;
    }

    public function renderSection($name)
    {
        switch ($name) {
            case '{zSummary}':
                return $this->renderZSummary();
            case '{summary}':
                return $this->renderSummary();
            case '{items}':
                return $this->renderItems();
            case '{pager}':
                return $this->renderPager();
            case '{sorter}':
                return $this->renderSorter();
            default:
                return false;
        }
    }

    /**
     * User: wangxj
     *
     * 汇总，$this->zSummary数组中的元素
     *
     * @return string
     */
    public function renderZSummary()
    {
        $str = '';
        if (!empty($this->zSummary)) {
            $str .= '<div class="zSummary-div">';
            foreach ($this->zSummary as $item) {
                $dataProvider = $this->dataProvider;
                /* @var $dataProvider ActiveDataProvider */
                /* @var $query ActiveQuery */
                /* @var $model yii\db\ActiveRecord */
                $query = $dataProvider->query;
                $modelClass = $query->modelClass;
                $model = new $modelClass();
                if (isset($item['label'])) {
                    $title = $item['label'];
                } else {
                    $title = $model->getAttributeLabel($item['attribute']);

                }
                $str .= '<span class="zSummary-label">' . $title . '：</span>' .
                    '<span class="zSummary-number ' . $item['class'] . '">' . number_format($query->sum($item['attribute']), 2) . '</span>';
            }
            $str .= '</div>';
        }
return $str;
}

/**
 * Renders the summary text.
 */
public
function renderSummary()
{
    $count = $this->dataProvider->getCount();
    if ($count <= 0) {
        return '';
    }
    $summaryOptions = $this->summaryOptions;
    $tag = ArrayHelper::remove($summaryOptions, 'tag', 'div');
    if (($pagination = $this->dataProvider->getPagination()) !== false) {
        $totalCount = $this->dataProvider->getTotalCount();
        $begin = $pagination->getPage() * $pagination->pageSize + 1;
        $end = $begin + $count - 1;
        if ($begin > $end) {
            $begin = $end;
        }
        $page = $pagination->getPage() + 1;
        $pageCount = $pagination->pageCount;
        if (($summaryContent = $this->summary) === null) {
            return Html::tag($tag, "共 <b>" . number_format($pageCount) . "</b>页 <b>" . number_format($totalCount) . "</b> 条记录", $summaryOptions);
        }
    } else {
        $begin = $page = $pageCount = 1;
        $end = $totalCount = $count;
        if (($summaryContent = $this->summary) === null) {
            return Html::tag($tag, Yii::t('yii', 'Total <b>{count, number}</b> {count, plural, one{item} other{items}}.', [
                'begin' => $begin,
                'end' => $end,
                'count' => $count,
                'totalCount' => $totalCount,
                'page' => $page,
                'pageCount' => $pageCount,
            ]), $summaryOptions);
        }
    }

    return Yii::$app->getI18n()->format($summaryContent, [
        'begin' => $begin,
        'end' => $end,
        'count' => $count,
        'totalCount' => $totalCount,
        'page' => $page,
        'pageCount' => $pageCount,
    ], Yii::$app->language);
}

//分页显示跳转页数
protected
function renderPagerGo()
{
    $pagination = $this->dataProvider->getPagination();
    $str = '';
    if ($pagination !== false && $pagination->pageCount > 1) {
        $str = '<div class="zPager zPagerGo"> <input type="text" id="pager-go" class="form-control pager-go"  /> ';
        $str .= '<button type="button" id="pager-btn" class="form-control btn pager-btn" onclick="z.pager(\'pagination\',' . $pagination->pageCount . ', this)" >GO</button></div>';
    }
    return $str;
}

/**
 * 每一列的总和
 *
 * @return null|string
 */
public
function renderPageSummary()
{
    if (!$this->showPageSummary) {
        return null;
    }
    $cells = [];
    /** @var zDataColumn $column */
    /* @var $dataProvider ActiveDataProvider */
    /* @var $query ActiveQuery */
    /* @var $model yii\db\ActiveRecord */
    $dataProvider = $this->dataProvider;
    $query = $dataProvider->query;
    foreach ($this->columns as $column) {
        if (get_class($column) == 'common\components\zDataColumn') {
            $column->query = $query;
        }
        $cells[] = $column->renderPageSummaryCell();
    }
    $tag = ArrayHelper::remove($this->pageSummaryContainer, 'tag', 'tbody');
    $content = Html::tag('tr', implode('', $cells), $this->pageSummaryRowOptions);
    return Html::tag($tag, $content, $this->pageSummaryContainer);
}
}