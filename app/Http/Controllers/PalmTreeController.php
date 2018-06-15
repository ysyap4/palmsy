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
use JasperPHP\JasperPHP;


class PalmTreeController extends Controller
{

    public function palmtree_index()
    {
       $palmtree = palmtree::all();

        return View::make('palmtree_index',array('palmtree' => $palmtree));
    }

    public function palmtree_create()
    {
        return View::make('palmtree_create');
    }

    public function palmtree_create_process()
    {
         $rules = array(
            'general_name' => 'required',
            'image_palmtree' => 'required',
            'scientific_name' => 'required',
            'product_type' => 'required',
            'gene' => 'required',
            'description' => 'required',
            );

        $validator = Validator::make(Input::all(),$rules);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('palmtree_create')///nama dlm roteu
            -> withErrors($validator)
            ->withInput (Input::except(''));
        }
        else
        {
            $add = new palmtree;
            $add->general_name = Input::get('general_name');
            $add->scientific_name = Input::get('scientific_name');
            $add->product_type = Input::get('product_type');
            $add->gene = Input::get('gene');
            $add->description = Input::get('description');
            $add->ins_index = 1;
            $add->sub_index = 1;

            $add->save();

            Session::flash('message','Successfully created palm tree!');
            return Redirect::to('palmtree_create');

        }
    }

    public function palmtree_show()
    {
        $palmtree = palmtree::all();

        $selected_palmtree = Input::get('selected_palmtree');

        $show_selected_palmtree = array();

        for ($i=0; $i < sizeof($selected_palmtree); $i++)
        {
            $show_selected_palmtree[$i] = '';
            $show_selected_palmtree[$i] = palmtree::find($selected_palmtree[$i]);
        }

        return View::make('palmtree_show',array('show_selected_palmtree'=>$show_selected_palmtree));
    }

    public function palmtree_edit()
    {
        $palmtree = palmtree::all();

        $selected_palmtree = Input::get('selected_palmtree');

        $edit_selected_palmtree = array();

        for ($i=0; $i < sizeof($selected_palmtree); $i++)
        {
            $edit_selected_palmtree[$i] = '';
            $edit_selected_palmtree[$i] = palmtree::find($selected_palmtree[$i]);
        }
  
        return View::make('palmtree_edit')->with(array('edit_selected_palmtree'=>$edit_selected_palmtree));
    }

    public function palmtree_edit_process()
    {
            $rules_edit = array(
            'general_name' => 'required',
            'image_palmtree' => 'required',
            'scientific_name' => 'required',
            'product_type' => 'required',
            'gene' => 'required',
            'description' => 'required',
            );

         $validator = Validator::make(Input::all(),$rules_edit);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('palmtree_index')
            -> withErrors($validator);
        }
        else
        {
            $palmtree = palmtree::all();
            $edit_selected_palmtree = Input::get('edit_selected_palmtree');
            $image_palmtree = Input::get('image_palmtree');
            $general_name = Input::get('general_name');
            $scientific_name = Input::get('scientific_name');
            $product_type = Input::get('product_type');
            $gene = Input::get('gene');
            $description = Input::get('description');
            $edit = array();

            for ($i=0; $i < sizeof($edit_selected_palmtree); $i++)
            {
                $edit[$i] = '';
                $edit[$i] = palmtree::find($edit_selected_palmtree[$i]);
                $edit[$i]->general_name = $general_name[$i];
                $edit[$i]->scientific_name = $scientific_name[$i];
                $edit[$i]->product_type = $product_type[$i];
                $edit[$i]->gene = $gene[$i];
                $edit[$i]->description = $description[$i];
                $edit[$i]->image_palmtree = $image_palmtree[$i];


                $edit[$i]->save();
            }

            Session::flash('message','Successfully Updated Palm Tree Info!');
            return Redirect::to('palmtree_index');
        }
    }

    public function palmtree_delete()
    {
        $selected_palmtree = Input::get('selected_palmtree');

        for ($i=0; $i < sizeof($selected_palmtree); $i++)
        {
            $delete_selected_palmtree[$i] = palmtree::where('id',$selected_palmtree[$i])->delete();
        }

        Session::flash('message','Successfully deleted palm tree!');
        return Redirect::to('palmtree_index');
    }

      public function cetak_ListOfPalmTree()
    {
        $btn_pdf = Input::get('btnpdf');
        $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "palmTreee";
        $reportPath =  "/views/laporan";
        

        $resource_path = $reportPath . "/" . "$filename.jasper";
        $public_path = "laporan/$filename";
        $pdf = "laporan/$filename.pdf";
        $xls = "laporan/$filename.xls";


        if(isset($btn_pdf))
        {
            $flag = "pdf";
        }
        if(isset($btn_xls))
        {
            $flag = "xls";
        }

        \JasperPHP::process(
            resource_path(). $resource_path,
            public_path()."/". $public_path,
            array("pdf", "xls"),
            array(),
            $database
            )->execute();

        return \View::make('report_index',
            array('report_title'=> 'LAPORAN SENARAI EDIT','pdf' => $pdf , 'xls' => $xls, 'flag' => $flag));
    }

    public function palmtree_print($id)
    {

        // $btn_pdf = Input::get('btnpdf');
        // $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "PalmTreeDetail";
        $reportPath =  "/views/laporan";
        

        $resource_path = $reportPath . "/" . "$filename.jasper";
        $public_path = "laporan/$filename";
        $pdf = "laporan/$filename.pdf";
        // $xls = "laporan/$filename.xls";


        // if(isset($btn_pdf))
        // {
            $flag = "pdf";
        // }
        // if(isset($btn_xls))
        // {
        //     $flag = "xls";
        // }

        \JasperPHP::process(
            resource_path(). $resource_path,
            public_path()."/". $public_path,
            array("pdf", "xls"),
            array('idN'=>$id),
            $database
            )->execute();

        return \View::make('report_index',
            array('report_title'=> 'LAPORAN SENARAI EDIT','pdf' => $pdf ,  'flag' => $flag));
    }

}
