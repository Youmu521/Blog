<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Blog;

use App\Models\Itemize;
use App\Models\Label;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

use App\Models\Blog AS blogs;
use App\Admin\Actions\Blog\Restore;
use App\Admin\Actions\Blog\BatchRestore;

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
            $grid->column('title');
            $grid->column('user_id');
            $grid->column('exposure');
            $grid->column('is_open')->switch();

            //获取 分类列表
            $itemizes = $this->getLabelsOrItemize('itemize');
            $grid->column('itemize')->select($itemizes);
            $grid->column('label')->label();


            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
//            $grid->column('content');

            $grid->filter(function (Grid\Filter $filter) use ($itemizes) {
                $filter->equal('id');
                $filter->equal('user_id');
                $filter->equal('itemize')->select($itemizes);
                $filter->like('label');
                $filter->equal('is_open')->select([ 0 => "未公开",1 => "已公开"]);
                $filter->scope('trashed', '回收站')->onlyTrashed();

            });

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if (request('_scope_') == 'trashed') {
                    $actions->append(new Restore(blogs::class));
                }
            });

            $grid->batchActions(function (Grid\Tools\BatchActions $batch) {
                if (request('_scope_') == 'trashed') {
                    $batch->add(new BatchRestore(blogs::class));
                }
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

            $show->field('title');
            $show->field('cover')->image();
            $show->field('exposure');
            $show->field('is_open')
                ->using([0=>"未公开",1=>"已公开"])
                ->dot([
                    0 => "danger",
                    1 => "success"
                ],"danger");
            $itemizes = $this->getLabelsOrItemize('itemize');

            $show->field('itemize')->using($itemizes);
            $show->field('label')->explode()->label();
            $show->field('user_id');
            $show->content();
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
            $itemizes = $this->getLabelsOrItemize('itemize');
            // 填充至下拉
            $form->select('itemize')->required()->options($itemizes);
            //获取 标签列表
            $labels = $this->getLabelsOrItemize('label');
            $form->tags('label', '标签')->options($labels)->saveAsString();

            $form->switch('is_open');
            $form->markdown('content');

            $form->display('created_at');
            $form->display('updated_at');

        });
    }

    /**
     * 获取 label标签 和 itemize分类 并转换成数组
     * @param $str
     * @return array
     */

    private function getLabelsOrItemize($str): array
    {
        if(strtolower($str) === 'label'){
            $res = Label::select('id','name')->orderBy('created_at')->get();
        }else if(strtolower($str) === 'itemize'){
            $res = Itemize::select('id','name')->orderBy('created_at')->get();
        }else{
            return [];
        }
        $labels = [];
        foreach ( $res as $label){
            $labels[$label['id']] = $label['name'];
        }
        return $labels;
    }
}
