<?php


namespace App\Admin\Renderable;

use App\Models\Label;
use Dcat\Admin\Grid;
use Dcat\Admin\Grid\LazyRenderable;

class LabelTable extends LazyRenderable
{

    public function grid(): Grid
    {
        // 获取外部传递的参数
        $id = $this->id;

        return Grid::make(new Label(), function (Grid $grid) {
            $grid->column('id');
            $grid->column('name');
            $grid->column('created_at');
            $grid->column('updated_at');

            $grid->quickSearch(['id', 'name']);

            $grid->paginate(10);
            $grid->disableActions();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->like('name')->width(4);
            });
        });
    }
}
