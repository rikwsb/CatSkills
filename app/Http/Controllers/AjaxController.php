<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function create()
    {

        return view('ajax-request');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        #create or update your data here

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
}
