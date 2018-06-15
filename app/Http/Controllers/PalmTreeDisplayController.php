<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;
use Session;
use App\Model\palmtree;


class PalmTreeDisplayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function palmtree_list()
    {
        $palmtree=palmtree::all();
        return View::make ('palmtree_list', array('palmtree' => $palmtree));
    }

       public function user_palmtreelist()
    {
        $palmtree=palmtree::all();
        return View::make ('user_palmtreelist', array('palmtree' => $palmtree));
    }

    public function palmtree_display($id)
    {
        $palmtree=palmtree::find($id);
        return View::make ('palmtree_display', array('palmtree' => $palmtree));


    }
}
