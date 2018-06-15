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
use DB;
use App\Model\palmtree;
use App\Model\modification;
use App\Model\analyzation;
use JasperPHP\JasperPHP;


class AnalyzationController extends Controller
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

    public function ana_index()
    {
        $palmtree = palmtree::all();
        $modification = modification::all();

        $mod_type = Input::get('mod_type');
        $mod_id = Input::get('mod_id');

        return View::make ('ana_index', array('modification' => $modification, 'palmtree' => $palmtree));
    }

    public function ana_index_process()
    {   
        $mod_id = Input::get('mod_id');

        $modification = modification::find($mod_id);

        $id = $modification->id;

        return Redirect::to('ana_select_analyze/'.$id);
    }   

    public function ana_select_analyze($id)
    {
        $modification = modification::find($id);

        return View::make ('ana_select_analyze', array('modification' => $modification));
    }

    public function ana_rgr($id)
    {
        $modification = modification::find($id);

        return View::make ('ana_rgr', array('modification' => $modification));
    }

    public function ana_rgr_show($id)
    {
        $modification = modification::find($id);

        $w2 = Input::get('w2');
        $w1 = Input::get('w1');
        $t2 = Input::get('t2');
        $t1 = Input::get('t1');

        $rgr_value = (log($w2, 2.718) - log($w1, 2.718)) / ($t2 - $t1);
        $rgr_value = round($rgr_value, 4);

        if ($rgr_value < 0.030)
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is low. Low growth rate of palm tree brings less production. As conclusion, the tree is not suitable to plant for production.";
        }
        elseif ($rgr_value > 0.030 && $rgr_value < 0.060) 
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is moderate. Medium growth rate of palm tree somewhat makes the good quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
        }
        else
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is high. High growth rate of palm tree makes the greater production. As conclusion, the tree is worth to plant for massive production.";
        }

        return View::make ('ana_rgr_show', array('modification' => $modification, 'rgr_value' => $rgr_value, 'w2' => $w2, 'w1' => $w1, 't2' => $t2, 't1' => $t1, 'rgr_description' => $rgr_description));
    }

    public function ana_rgr_save($id, $rgr_value)
    {
        $modification = modification::find($id);
        $analyzation = analyzation::all();

        if ($rgr_value < 0.030)
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is low. Low growth rate of palm tree brings less production. As conclusion, the tree is not suitable to plant for production.";
        }
        elseif ($rgr_value > 0.030 && $rgr_value < 0.060) 
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is moderate. Medium growth rate of palm tree somewhat makes the good quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
        }
        else
        {
            $rgr_description = "This RGR value shows that the growth rate of tree is high. High growth rate of palm tree makes the greater production. As conclusion, the tree is worth to plant for massive production.";
        }

        foreach ($analyzation as $value) 
        {
            if($value->mod_id == $id)
                $ana_id = $value->id;
        }

        if (isset($ana_id))
        {
            $add = analyzation::find($ana_id);
            $add->rgr_value = $rgr_value;
            $add->rgr_description = $rgr_description;

            $add->save();

            $analyzation = analyzation::find($add->id);
        }
        else
        {    
            $add = new analyzation;
            $add->mod_id = $modification->id;
            $add->scientific_name = $modification->scientific_name;
            $add->mod_type = $modification->mod_type;
            $add->rgr_value = $rgr_value;
            $add->rgr_description = $rgr_description;
        
            $add->save();
        
            $analyzation = analyzation::find($add->id);
        }

        return Redirect::to('ana_index');
    }

    public function ana_wp($id)
    {
        $modification=modification::find($id);

        return View::make ('ana_wp', array('modification' => $modification));
    }

    public function ana_wp_show($id)
    {
        $modification = modification::find($id);

        $pp = Input::get('pp');
        $sp = Input::get('sp');

        $wp_value = $pp + $sp;
        $wp_value = round($wp_value, 4);

        if ($wp_value < 30)
        {
            $wp_description = "This water potential (Ψ) value shows that the potential energy of water per unit volume of tree is low. Low potential energy decreases the transportation of water, delays the production. As conclusion, the tree is not suitable to plant for production.";
        }
        elseif ($wp_value > 30 && $wp_value < 60) 
        {
            $wp_description = "This water potential (Ψ) value shows that the potential energy of water per unit volume of tree is moderate. Medium potential energy regulates the transportation of water, supports the fine quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
        }
        else
        {
            $wp_description = "This water potential (Ψ) value shows that the potential energy of water per unit volume of tree is high. High potential energy increases the transportation of water, facilitates the production. As conclusion, the tree is worth to plant for massive production.";
        }

        return View::make ('ana_wp_show', array('modification' => $modification, 'wp_value' => $wp_value, 'pp' => $pp, 'sp' => $sp, 'wp_description' => $wp_description));
    }

    public function ana_wp_save($id, $wp_value)
    {
        $modification = modification::find($id);
        $analyzation = analyzation::all();

        if ($wp_value < 30)
        {
            $wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is low. Low potential energy decreases the transportation of water, delays the production. As conclusion, the tree is not suitable to plant for production.";
        }
        elseif ($wp_value > 30 && $wp_value < 60) 
        {
            $wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is moderate. Medium potential energy regulates the transportation of water, supports the fine quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
        }
        else
        {
            $wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is high. High potential energy increases the transportation of water, facilitates the production. As conclusion, the tree is worth to plant for massive production.";
        }

        foreach ($analyzation as $value) 
        {
            if($value->mod_id == $id)
                $ana_id = $value->id;
        }

        if (isset($ana_id))
        {
            $add = analyzation::find($ana_id);
            $add->wp_value = $wp_value;
            $add->wp_description = $wp_description;

            $add->save();

            $analyzation = analyzation::find($add->id);
        }
        else
        {    
            $add = new analyzation;
            $add->mod_id = $modification->id;
            $add->scientific_name = $modification->scientific_name;
            $add->mod_type = $modification->mod_type;
            $add->wp_value = $wp_value;
            $add->wp_description = $wp_description;
        
            $add->save();
        
            $analyzation = analyzation::find($add->id);
        }

        return Redirect::to('ana_index');
    }

    public function ana_sn($id)
    {
        $modification=modification::find($id);

        return View::make ('ana_sn', array('modification' => $modification));
    }

    public function ana_sn_show($id)
    {
        $modification = modification::find($id);

        $sn_value = Input::get('sn');
        $d1 = Input::get('d1');
        $d2 = Input::get('d2');
        $r1 = Input::get('r1');
        $r2 = Input::get('r2');

        $sn_a = 9/16 * $sn_value;
        $sn_b = 3/16 * $sn_value;
        $sn_c = 3/16 * $sn_value;
        $sn_d = 1/16 * $sn_value;

        return View::make ('ana_sn_show', array('modification' => $modification, 'sn_value' => $sn_value, 'sn_a' => $sn_a, 'sn_b' => $sn_b, 'sn_c' => $sn_c, 'sn_d' => $sn_d, 'd1' => $d1, 'd2' => $d2, 'r1' => $r1, 'r2' => $r2));
    }

    public function ana_sn_save($id, $sn_value, $d1, $d2, $r1, $r2)
    {
        $modification = modification::find($id);
        $analyzation = analyzation::all();

        $sn_a = 9/16 * $sn_value;
        $sn_a = "$sn_a $d1 $d2,";
        $sn_b = 3/16 * $sn_value;
        $sn_b = "$sn_b $d1 $r2,";
        $sn_c = 3/16 * $sn_value;
        $sn_c = "$sn_c $r1 $d2,";
        $sn_d = 1/16 * $sn_value;
        $sn_d = "$sn_d $r1 $r2";

        $sn_description = "$sn_a $sn_b $sn_c $sn_d";

        foreach ($analyzation as $value) 
        {
            if($value->mod_id == $id)
                $ana_id = $value->id;
        }

        if (isset($ana_id))
        {
            $add = analyzation::find($ana_id);
            $add->sn_value = $sn_value;
            $add->sn_description = $sn_description;

            $add->save();

            $analyzation = analyzation::find($add->id);
        }
        else
        {    
            $add = new analyzation;
            $add->mod_id = $modification->id;
            $add->scientific_name = $modification->scientific_name;
            $add->mod_type = $modification->mod_type;
            $add->sn_value = $sn_value;
            $add->sn_description = $sn_description;
        
            $add->save();
        
            $analyzation = analyzation::find($add->id);
        }

        return Redirect::to('ana_index');
    }

    public function analyzation_index()
    {
        $analyzation = analyzation::all();

        return View::make('analyzation_index',array('analyzation' => $analyzation));
    }

    public function analyzation_create()
    {
        return View::make('analyzation_create');
    }

    public function analyzation_create_process()
    {
         $rules = array(
            'mod_id' => 'required',
            'scientific_name' => 'required',
            'mod_type' => 'required',
            'rgr_value' => 'required',
            'wp_value' => 'required',
            'sn_value' => 'required',
            );

        $validator = Validator::make(Input::all(),$rules);

        if ($validator -> fails())
        {
            $messages = $validator->messages();
            
            return Redirect::to('analyzation_create')
            ->withErrors($validator)
            ->withInput(Input::except(''));
        }
        else
        {
            $add = new analyzation;
            $add->mod_id = Input::get('mod_id');
            $add->scientific_name = Input::get('scientific_name');
            $add->mod_type = Input::get('mod_type');
            $add->rgr_value = Input::get('rgr_value');
            $add->wp_value = Input::get('wp_value');
            $add->sn_value = Input::get('sn_value');

            if ($add->rgr_value < 0.030)
            {
                $add->rgr_description = "This RGR value shows that the growth rate of tree is low. Low growth rate of palm tree brings less production. As conclusion, the tree is not suitable to plant for production.";
            }
            elseif ($add->rgr_value > 0.030 && $add->rgr_value < 0.060) 
            {
                $add->rgr_description = "This RGR value shows that the growth rate of tree is moderate. Medium growth rate of palm tree somewhat makes the good quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
            }
            else
            {
                $add->rgr_description = "This RGR value shows that the growth rate of tree is high. High growth rate of palm tree makes the greater production. As conclusion, the tree is worth to plant for massive production.";
            }

            if ($add->wp_value < 30)
            {
                $add->wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is low. Low potential energy decreases the transportation of water, delays the production. As conclusion, the tree is not suitable to plant for production.";
            }
            elseif ($add->wp_value > 30 && $add->wp_value < 60) 
            {
                $add->wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is moderate. Medium potential energy regulates the transportation of water, supports the fine quantity of production but not that large. As conclusion, the tree is appropriate to plant for regular production.";
            }
            else
            {
                $add->wp_description = "This water potential value shows that the potential energy of water per unit volume of tree is high. High potential energy increases the transportation of water, facilitates the production. As conclusion, the tree is worth to plant for massive production.";
            }

            $add->save();

            Session::flash('message','Successfully created analyzation!');
            return Redirect::to('analyzation_create');

        }
    }

    public function analyzation_show()
    {
        $analyzation = analyzation::all();

        $selected_analyzation = Input::get('selected_analyzation');

        $show_selected_analyzation = array();

        for ($i=0; $i < sizeof($selected_analyzation); $i++)
        {
            $show_selected_analyzation[$i] = '';
            $show_selected_analyzation[$i] = analyzation::find($selected_analyzation[$i]);
        }

        return View::make('analyzation_show',array('show_selected_analyzation'=>$show_selected_analyzation));
    }

    public function analyzation_edit()
    {
        $analyzation = analyzation::all();

        $selected_analyzation = Input::get('selected_analyzation');

        $edit_selected_analyzation = array();

        for ($i=0; $i < sizeof($selected_analyzation); $i++)
        {
            $edit_selected_analyzation[$i] = '';
            $edit_selected_analyzation[$i] = analyzation::find($selected_analyzation[$i]);
        }

        
        return View::make('analyzation_edit')->with(array('edit_selected_analyzation'=>$edit_selected_analyzation));
    }

    public function analyzation_edit_process()
    {
        $analyzation = analyzation::all();
        $edit_selected_analyzation = Input::get('edit_selected_analyzation');
        $mod_id = Input::get('mod_id');
        $scientific_name = Input::get('scientific_name');
        $mod_type = Input::get('mod_type');
        $rgr_value = Input::get('rgr_value');
        $wp_value = Input::get('wp_value');
        $sn_value = Input::get('sn_value');
        $edit = array();

        for ($i=0; $i < sizeof($edit_selected_analyzation); $i++)
        {
            $edit[$i] = '';
            $edit[$i] = analyzation::find($edit_selected_analyzation[$i]);
            $edit[$i]->mod_id = $mod_id[$i];
            $edit[$i]->scientific_name = $scientific_name[$i];
            $edit[$i]->mod_type = $mod_type[$i];
            $edit[$i]->rgr_value = $rgr_value[$i];
            $edit[$i]->wp_value = $wp_value[$i];
            $edit[$i]->sn_value = $sn_value[$i];

            $edit[$i]->save();
        }

        Session::flash('message','Successfully Updated Analyzation!');
        return Redirect::to('analyzation_index');
    }

    public function analyzation_delete()
    {
        $selected_analyzation = Input::get('selected_analyzation');

        for ($i=0; $i < sizeof($selected_analyzation); $i++)
        {
            $delete_selected_analyzation[$i] = analyzation::where('id',$selected_analyzation[$i])->delete();
        }

        Session::flash('message','Successfully deleted analyzation!');
        return Redirect::to('analyzation_index');
    }

        public function modification_checklist()
    {
        $modification = modification::all();
        return View::make('modification_checklist',array('modification' => $modification));
    }


       public function cetak_ListOfAnalyzation()
    {

    $btn_pdf = Input::get('btnpdf');
        $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "analyze";
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

     public function analyzation_print($id)
    {

        // $btn_pdf = Input::get('btnpdf');
        // $btn_xls = Input::get('btnxls');

        $database = \Config::get('database.connections.generic');
        $jasper = new JasperPHP();
        $filename = "analyzeDetail";
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
            array('idAna'=>$id),
            $database
            )->execute();

        return \View::make('report_index',
            array('report_title'=> 'LAPORAN SENARAI EDIT','pdf' => $pdf ,  'flag' => $flag));
    }
}
