<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Label;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LabelController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Label(), function (Grid $grid) {
            $grid->column('id')->sortable();

            $grid->column('name')->label();
            $grid->column('is_disable')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });

            //设置操作按钮为右键展开
            $grid->setActionClass(Grid\Displayers\ContextMenuActions::class);
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Label(), function (Show $show) {
            $show->field('id');
            // using 设置显示  dot 设置前面的小圆点
            $show->field('is_disable')
                ->using([0=>"未禁用",1=>"已禁用"])
                ->dot([
                    0 => "success",
                    1 => "danger"
                ],"success");
            $show->field('name');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Label(), function (Form $form) {
            $form->display('id');

            $form->text('name')->required();
            $form->switch('is_disable');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
