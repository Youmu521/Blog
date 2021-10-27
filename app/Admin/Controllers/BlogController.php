<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\LabelTable;
use App\Admin\Repositories\Blog;

use App\Models\Itemize;
use App\Models\Label;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class BlogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Blog(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('cover');
            $grid->column('exposure');
            $grid->column('is_open');
            $grid->column('itemize');
            $grid->column('label');
            $grid->column('title');

            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->column('content');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new Blog(), function (Show $show) {
            $show->field('id');

            $show->field('cover');
            $show->field('exposure');
            $show->field('is_open');
            $show->field('itemize');
            $show->field('label');
            $show->field('title');
            $show->field('user_id');
            $show->field('content');
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
        return Form::make(new Blog(), function (Form $form) {
            $form->display('id');
            $form->hidden('exposure')->default(0);
            $form->hidden('user_id')->default(1);
            $form->image('cover')->autoUpload();
            $form->text('title')->required();


            //获取 分类列表
            $itemizes = [];
            $res = Itemize::select('id','name')->orderBy('created_at')->get();
            foreach ( $res as $itemize){
                $itemizes[$itemize['id']] = $itemize['name'];
            }
            // 填充至下拉
            $form->select('itemize')->required()->options($itemizes);


            $form->selectTable('label')

                ->title('标签')
                ->placeholder("请选择  标签")
                ->from(LabelTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(Label::class, 'id', 'name'); // 设置编辑数据显示


            $form->switch('is_open');
            $form->markdown('content');

            $form->display("deleted_at");
            $form->display('created_at');
            $form->display('updated_at');


        });
    }
}
