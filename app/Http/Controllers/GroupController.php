<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupNumbers;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NumbersImport;
use Auth;

class GroupController extends Controller
{
    public function index() {
        $groups = Auth::user()->groups;
        return view('groups.index')->with('groups', $groups);
    }

    public function create() {
        return view('groups.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
             'select_file'  => 'required|mimes:xls,xlsx',
             'group_name' => 'required',
        ]);
               
 
        if ( $validator->passes() ) {
             $group_name = $request->input( 'group_name' );
 
             $rows = Excel::toArray(new NumbersImport, request()->file('select_file'));
 
             $this->count = 0;
 
             foreach($rows[0] as $row)
             {
                if (empty($row[0])) { break; }

                 $numList[] = array(
                     'sms_number' => $row[0],
                     'created_at' => now(),
                     'updated_at' => now()
                 );
                 $this->count++;
             }
 
             if(!empty($numList))
             {
                // Creating new Group
                $newGroup = [
                    'group_name' => $group_name,
                    'user_id' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                $group_id = Group::insertGetId($newGroup);

                // adding to newly created group_id to group_numbers array
                $group_numbers_to_add = array_map(function($oldArray) use ($group_id) {
                    return array_merge($oldArray, array('group_id' => $group_id));  
                }, $numList);

                // Adding group_numbers
                GroupNumbers::insert($group_numbers_to_add);

             } else { return back()->with( 'success', "Wrong format or empty file!" ); }
             
             return redirect()->route('groups')->with('success', "New Group created successfully!" );
         }
         else {
             return back()->withErrors( $validator );
         }
 
     }

     public function destroy($id) {
        //Find a group with a given id and delete
        Group::where('id', $id)->delete();
    
            return redirect()->route('groups')
                ->with('flash_message',
                 'Group successfully deleted.');
    }
}
