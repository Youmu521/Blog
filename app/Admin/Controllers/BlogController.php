<?php

namespace App\Admin\Controllers;

use App\Models\Blog;
use App\Models\Itemize;
use App\Models\Label;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BlogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Blog::with('user','itemize','label'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name','用户');
            $grid->column('itemize.name','分类')->select(Itemize::where('is_disable',0)->pluck('name','id'));
            $grid->column('cover');
            $grid->label()->pluck('name')->label();
            $grid->column('title');
            $grid->column('is_open')->switch();
            $grid->column('is_markdown','内容类型')
                ->using([0 => '普通博客','1' => 'markdown'])
                ->dot([
                    0 => 'primary',
                    1 => 'success'
                ])->label('yellow');
            $grid->column('exposure');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

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
        return Show::make($id, Blog::with('user','itemize','label'), function (Show $show) {
            $show->field('id');
            $show->field('user.name','用户');
            $show->field('itemize.name','分类');
            $show->field('cover')->image();
            $show->field('title');

            $show->label()->pluck('name')->label();
            $show->field('is_open')
                ->using([0=>"未公开",1=>"已公开"])
                ->dot([
                    0 => "danger",
                    1 => "success"
                ],"danger");
            $show->field('is_markdown','内容类型')
                ->using([0 => '普通博客',1 => 'markdown'])
                ->dot([
                    0 => 'primary',
                    1 => 'success'
                ]);
            $show->field('content');
            $show->field('markdown');
            $show->field('exposure');
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
        return Form::make(Blog::with('label'), function (Form $form) {
            $form->display('id');
            $form->select('user_id')
                ->options(User::all()->pluck('name','id'))
                ->default(1);
            $form->image('cover')->autoUpload();
            $form->text('title')->required();
            $form->select('itemize_id')
                ->options(Itemize::where('is_disable',0)->pluck('name','id'))
                ->required();

            $form->tags('label','标签')
                ->pluck('name','id')
                ->options(Label::where('is_disable',0)->get())
                ->saving(function ($value) {
                    $arr = [];
                    //循环提交，如果为数字，就不存储
                    foreach ($value as $v){
                        if (is_numeric($v)){
                            $arr[] = $v;
                        }else{
                            // 避免重复提交，如果标签存在，就返回 id，它的值竟然是 id（开始以为 key 才是 id）
                            $label = Label::firstOrCreate(['name' => $v]);
                            $arr[] = (string)$label->id;
                        }
                    }
                    return $arr;
                });
            // 默认为
            $form->radio('is_markdown','内容类型')
                ->when(0,function (Form $form){
                    $form->editor('content');
                })
                ->when(1,function (Form $form){
                    $form->markdown('markdown');
                })
                ->options([
                    0 => "普通博客",
                    1 => 'markdown'
                ])
                ->default(0);


            $form->switch('is_open');
            $form->hidden('exposure')->default(0);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
