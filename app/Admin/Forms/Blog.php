<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;

class Blog extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        // dump($input);

        // return $this->response()->error('Your error message.');
        $label = $input['label'];

        dd($label);

        return $this
				->response()
				->success('Processed successfully.')
				->refresh();
    }

}
