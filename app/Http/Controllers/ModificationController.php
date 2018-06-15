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
use App\Model\modification;
use App\Model\palmtree;
use JasperPHP\JasperPHP;

class ModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mod_index()
    {
        $palmtree = palmtree::all();
        return View::make('mod_index',array('palmtree' => $palmtree));
    }

    public function user_modindex()
    {
        $palmtree = palmtree::all();
        return View::make('user_modindex',array('palmtree' => $palmtree));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mod_select_mutation($id)
    {
        $palmtree = palmtree::find($id);
        return View::make('mod_select_mutation',array('palmtree' => $palmtree));
    }

    public function mod_insertion($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_insertion',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_insertion_edit($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_insertion_edit',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_insertion_edit_process($id)
    {
        $palmtree = palmtree::find($id);

        $palmtree->ins_index = Input::get('ins_index');
        
        $palmtree->save();

        return Redirect::to('mod_insertion/'.$id);
    }

    public function mod_insertion_show($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        $ins_base_seq = Input::get('ins_base_seq');

        $mod_gene_array = array();
        $mod_gene_array = $ori_gene_array;

        if ($ins_base_seq=='-')
        {

        }
        else
        {
            $mod_gene_array[strlen($mod_gene_array)] = '';
        }

        for ($i=0; $i < strlen($mod_gene_array); $i++)
        {
            if ($i < $palmtree->ins_index)  // All the elements before the one that must be inserted
            {
                $mod_gene_array[$i] = $ori_gene_array[$i];
            }
  
            if ($i == $palmtree->ins_index)  // The right place to insert the new element
            {
                if ($ins_base_seq=='-')
                    $mod_gene_array[$i] = $ori_gene_array[$i];
                else
                    $mod_gene_array[$i] = $ins_base_seq;
            }
 
            if ($i > $palmtree->ins_index)  // Now all the remaining elements
            {
                if ($ins_base_seq=='-')
                    $mod_gene_array[$i] = $ori_gene_array[$i];
                else
                    $mod_gene_array[$i] = $ori_gene_array[$i-1];
            }
        }

        if ($mod_gene_array == $ori_gene_array)
        {
            Session::flash('message','The modified gene sequence is same as the original gene sequence, please try again!');
            return Redirect::to('mod_insertion/'.$id);
        }

        return View::make('mod_insertion_show',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array, 'mod_gene_array' => $mod_gene_array));
    }

    public function mod_insertion_save($id, $mod_gene_array)
    {
        $palmtree = palmtree::find($id);

        $add = new modification;
        $add->scientific_name = $palmtree->scientific_name;
        $add->ori_seq = $palmtree->gene;
        $add->mod_seq = $mod_gene_array;
        $add->mod_type = 'Insertion';

        $add->save();

        $modification = modification::find($add->id);
                                        
        return View::make('mod_insertion_save',array('palmtree' => $palmtree, 'mod_gene_array' => $mod_gene_array, 'modification' => $modification));
    }

    public function mod_deletion($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_deletion',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_deletion_show($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        $del_index = Input::get('del_index');

        $mod_gene_array = array();
        $mod_gene_array = $ori_gene_array;

        for ($i=0; $i < strlen($mod_gene_array); $i++)
        { 
            if ($i < $del_index)
            {
                $mod_gene_array[$i] = $ori_gene_array[$i];
            }
  
            if ($i >= $del_index)
            {
                if ($i == strlen($mod_gene_array)-1)  
                   $mod_gene_array[strlen($mod_gene_array)-1] = '';
                else
                    $mod_gene_array[$i] = $ori_gene_array[$i+1];
            }     
        }

        $mod_gene_array = rtrim($mod_gene_array, $mod_gene_array[strlen($mod_gene_array)-1]);

        return View::make('mod_deletion_show',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array, 'mod_gene_array' => $mod_gene_array, 'del_index' => $del_index));
    }

    public function mod_deletion_save($id, $mod_gene_array)
    {
        $palmtree = palmtree::find($id);

        $add = new modification;
        $add->scientific_name = $palmtree->scientific_name;
        $add->ori_seq = $palmtree->gene;
        $add->mod_seq = $mod_gene_array;
        $add->mod_type = 'Deletion';

        $add->save();

        $modification = modification::find($add->id);
                                        
        return View::make('mod_deletion_save',array('palmtree' => $palmtree, 'mod_gene_array' => $mod_gene_array, 'modification' => $modification));
    }

    public function mod_substitution($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_substitution',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_substitution_edit($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_substitution_edit',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_substitution_edit_process($id)
    {
        $palmtree = palmtree::find($id);

        $palmtree->sub_index = Input::get('sub_index');
        
        $palmtree->save();

        return Redirect::to('mod_substitution/'.$id);
    }

    public function mod_substitution_show($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        $sub_base_seq = Input::get('sub_base_seq');

        $mod_gene_array = array();
        $mod_gene_array = $ori_gene_array;

        for ($i=0; $i < strlen($mod_gene_array); $i++)
        { 
            if ($i == $palmtree->sub_index-1)
            {
                if ($sub_base_seq=='-')
                    $mod_gene_array[$i] = $ori_gene_array[$i];
                else
                    $mod_gene_array[$i] = $sub_base_seq;
            }
            else
            {
                $mod_gene_array[$i] = $ori_gene_array[$i];
            }
        }

        if ($mod_gene_array == $ori_gene_array)
        {
            Session::flash('message','The modified gene sequence is same as the original gene sequence, please try again!');
            return Redirect::to('mod_substitution/'.$id);
        }

        return View::make('mod_substitution_show',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array, 'mod_gene_array' => $mod_gene_array));
    }

    public function mod_substitution_save($id, $mod_gene_array)
    {
        $palmtree = palmtree::find($id);

        $add = new modification;
        $add->scientific_name = $palmtree->scientific_name;
        $add->ori_seq = $palmtree->gene;
        $add->mod_seq = $mod_gene_array;
        $add->mod_type = 'Substitution';

        $add->save();

        $modification = modification::find($add->id);
                                        
        return View::make('mod_substitution_save',array('palmtree' => $palmtree, 'mod_gene_array' => $mod_gene_array, 'modification' => $modification));
    }

    public function mod_duplication($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        return View::make('mod_duplication',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array));
    }

    public function mod_duplication_show($id)
    {
        $palmtree = palmtree::find($id);

        $ori_gene_array = serialize($palmtree->gene);
        $ori_gene_array = unserialize($ori_gene_array);

        $dup_index = Input::get('dup_index');

        $mod_gene_array = array();
        $mod_gene_array = $ori_gene_array;

        $dup_array = array();

        for ($i=0; $i < sizeof($dup_index); $i++)
        {
            $dup_array[$i] = $ori_gene_array[$dup_index[$i]];
            $mod_gene_array[strlen($ori_gene_array)+$i] = '';
        }

        $count = 0;
        $j = 0;

        for ($i=0; $i < strlen($mod_gene_array); $i++)
        {
            if ($i < $dup_index[sizeof($dup_index)-1])
            {
                $mod_gene_array[$i] = $ori_gene_array[$j];
                $j++;
            }
  
            if ($i == $dup_index[sizeof($dup_index)-1])
            {
                $mod_gene_array[$i] = $ori_gene_array[$j];
                $j++;
            }
 
            if ($i > $dup_index[sizeof($dup_index)-1] )
            {
                if ($count == sizeof($dup_index))
                {
                    $mod_gene_array[$i] = $ori_gene_array[$j];
                    $j++;
                }
                else
                {    
                    $mod_gene_array[$i] = $dup_array[$count];
                    $count++;
                }           
            }
        }

        if ($mod_gene_array == $ori_gene_array)
        {
            Session::flash('message','The modified gene sequence is same as the original gene sequence, please try again!');
            return Redirect::to('mod_duplication/'.$id);
        }

        return View::make('mod_duplication_show',array('palmtree' => $palmtree, 'ori_gene_array' => $ori_gene_array, 'mod_gene_array' => $mod_gene_array));
    }

    public function mod_duplication_save($id, $mod_gene_array)
    {
        $palmtree = palmtree::find($id);

        $add = new modification;
        $add->scientific_name = $palmtree->scientific_name;
        $add->ori_seq = $palmtree->gene;
        $add->mod_seq = $mod_gene_array;
        $add->mod_type = 'Duplication';

        $add->save();

        $modification = modification::find($add->id);
                                        
        return View::make('mod_duplication_save',array('palmtree' => $palmtree, 'mod_gene_array' => $mod_gene_array, 'modification' => $modification));
    }

    public function modification_index()
    {
        $modification = modification::all();
        return View::make('modification_index',array('modification' => $modification));
    }

    public function modification_create()
    {
        return View::make('modification_create');
    }

    public function modification_create_process()
    {
         $rules = array(
            'scientific_name' => 'required',
            'ori_seq' => 'required',
            'mod_seq' => 'required',
            'mod_type' => 'required',
            );

        $validator = Validator::make(Input::all(),$rules);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to('modification_create')
            -> withErrors($validator)
            ->withInput (Input::except(''));
        }
        else
        {
            $add = new modification;
            $add->scientific_name = Input::get('scientific_name');
            $add->ori_seq = Input::get('ori_seq');
            $add->mod_seq = Input::get('mod_seq');
            $add->mod_type = Input::get('mod_type');

            $add->save();

            Session::flash('message','Successfully created Gene Modification!');
            return Redirect::to('modification_create');

        }
    }

    public function modification_show()
    {
        $modification = modification::all();

        $selected_modification = Input::get('selected_modification');

        $show_selected_modification = array();

        for ($i=0; $i < sizeof($selected_modification); $i++)
        {
            $show_selected_modification[$i] = '';
            $show_selected_modification[$i] = modification::find($selected_modification[$i]);
        }

        return View::make('modification_show',array('show_selected_modification'=>$show_selected_modification));
    }

    public function modification_edit()
    {
        $modification = modification::all();

        $selected_modification = Input::get('selected_modification');

        $edit_selected_modification = array();

        for ($i=0; $i < sizeof($selected_modification); $i++)
        {
            $edit_selected_modification[$i] = '';
            $edit_selected_modification[$i] = modification::find($selected_modification[$i]);
        }
  
        return View::make('modification_edit')->with(array('edit_selected_modification'=>$edit_selected_modification));
    }

    public function  modification_edit_process()
    {
         $rules_edit = array(
            'scientific_name' => 'required',
            'ori_seq' => 'required',
            'mod_seq' => 'required',
            'mod_type' => 'required',
            );

         $validator = Validator::make(Input::all(),$rules_edit);

        if($validator -> fails()){

            $messages = $validator->messages();
            
            return Redirect::to(' modification_index')
            -> withErrors($validator)
            ->withInput (Input::except(''));
        }
        else
        {
            $modification = modification::all();
            $edit_selected_modification = Input::get('edit_selected_modification');
            $scientific_name = Input::get('scientific_name');
            $ori_seq = Input::get('ori_seq');
            $mod_seq = Input::get('mod_seq');
            $mod_type = Input::get('mod_type');
            $edit = array();

            for ($i=0; $i < sizeof($edit_selected_modification); $i++)
            {
                $edit[$i] = '';
                $edit[$i] = modification::find($edit_selected_modification[$i]);
                $edit[$i]->scientific_name = $scientific_name[$i];
                $edit[$i]->ori_seq = $ori_seq[$i];
                $edit[$i]->mod_seq = $mod_seq[$i];
                $edit[$i]->mod_type = $mod_type[$i];

                $edit[$i]->save();
            }

            Session::flash('message','Successfully updated modification!');
            return Redirect::to('modification_index');
        }

    }

     public function modification_delete()
    {
        $selected_modification = Input::get('selected_modification');

        for ($i=0; $i < sizeof($selected_modification); $i++)
        {
            $delete_selected_modification[$i] = modification::where('id',$selected_modification[$i])->delete();
        }

        Session::flash('message','Successfully deleted modification!');
        return Redirect::to('modification_index');
    }


      public function cetak_ListOfModification()
    {

    $btn_pdf = Input::get('btnpdf');
        $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "modification";
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

     public function modification_print($id)
    {

        // $btn_pdf = Input::get('btnpdf');
        // $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "modificationDetail2";
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
            array('idModify'=>$id),
            $database
            )->execute();

        return \View::make('report_index',
            array('report_title'=> 'LAPORAN SENARAI EDIT','pdf' => $pdf ,  'flag' => $flag));
    }



}

