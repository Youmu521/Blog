<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Itemize;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ItemizeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Itemize(), function (Grid $grid) {
            $grid->column('id')->sortable();

            $grid->column('name')->label();
            $grid->column('image')->image('',100,100);
            $grid->column('is_disable')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            //禁用批量删除
            $grid->disableBatchDelete();
            //禁用删除按钮
            $grid->disableDeleteButton();
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
        return Show::make($id, new Itemize(), function (Show $show) {
            $show->field('id');
            $show->field('image')->image();

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

            $show->panel()
                ->tools(function ($tools) {
                    $tools->disableDelete();
                });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Itemize(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            //图片将自动上传
            $form->image('image')->autoUpload()->uniqueName()->required();
            $form->switch('is_disable');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

}
