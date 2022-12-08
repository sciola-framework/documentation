<?php

namespace Layers\Controllers;

use Sciola\Controller;

class MyController extends Controller
{
    public function demo()
    {
        $model = model('MyModel');
        $model->insert('Foo');
        $data['arr'] = $model->select();
        return view('demo', $data);
    }
}
