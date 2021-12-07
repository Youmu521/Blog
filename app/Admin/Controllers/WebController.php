<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Web;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Tree;

class WebController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Web(), function (Grid $grid) {
            $grid->column('id')->sortable();

            $grid->column('title')->tree(true,false);
            $grid->column('order')->orderable();

            $grid->column('is_bottom')->bool();
            $grid->column('remarks');
            $grid->column('url');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            //开启弹窗创建表单
            $grid->enableDialogCreate();
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
        return Show::make($id, new Web(), function (Show $show) {
            $show->field('id');
            $show->field('parent_id');
            $show->field('order');
            $show->field('title');
            $show->field('is_bottom');
            $show->field('remarks');
            $show->field('url');
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
        return Form::make(new Web(), function (Form $form) {
            $form->display('id');
            // 树状表单
            $form->select('parent_id',__('父级'))
                ->options(\App\Models\Web::selectOptions())
                ->default(0);
            $form->text('order');
            $form->text('title');
            // 分类显示
            $form->radio('is_bottom')
                ->when(0,function (Form $form){

                })
                ->when(1,function(Form $form){
                    $form->text('remarks');
                    $form->text('url');
                })
                ->options([
                    0 => '不为底部',
                    1 => "为底部"
                ])
                ->default(0);


            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
