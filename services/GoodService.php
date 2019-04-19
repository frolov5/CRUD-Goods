<?php

namespace app\services;


use app\forms\good\CreateForm;
use app\forms\good\UpdateForm;
use app\models\Good;

class GoodService
{

    /**
     * @param CreateForm $form
     * @return bool
     */
    public function create(CreateForm $form)
    {
        $good = new Good();
        $good->title = $form->title;
        $good->price = $form->price;
        $good->description = $form->description;
        $good->category_id = $form->category_id;
        $good->status = $form->status;

        return $good->save();

    }

    /**
     * @param UpdateForm $form
     * @return bool
     */
    public function update(UpdateForm $form)
    {
        return $form->save();
    }

}