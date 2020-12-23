<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    //
    public function index()
    {
            $data = Category::all();
            return view('category.all',compact(data));

    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = Category::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()->back()->with('success', 'Category has been added Successfully');
    }

    public function edit($id)
        {
            $cat = Category::find($id);

            return view('admin.category.edit', compact('cat'));
        }

    public function update($id)
    {

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $cat=Category::find($id);
        $cat->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        return redirect()->back()->with('success', 'Category has been updated Successfully');
    }

    public function all()
    {

        return view('admin.category.all');
    }

    public function data()
    {
        $categories = DB::table('category')
            ->select(['id', 'name', 'description', 'is_active']);

        return Datatables::of($categories) ->addColumn('action', function ($category) {

                $editURL = url('admin/category/'.$category->id.'/edit');
                $suspendURL = url('admin/category/'.$category->id.'/suspend');
                $active = url('admin/category/'.$category->id.'/active');


                $editBtn = '<a href="'.$editURL.'" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>';
                $suspendBtn = '<a href="'.$suspendURL.'" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Suspend</a>';
                $activeBtn = '<a href="'.$active.' class="btn btn-sm btn-success"><i class="fa fa-ticket"></i> Activate</a>';

                if($category->is_active)
                    return $editBtn.' '.$suspendBtn;
                else
                    return $editBtn.' '.$activeBtn;
            })
            ->make(true);
    }

    public function active($id)
    {
        $cat = Category::find($id);
        $cat->update(['is_active' => 1]);

        return redirect()->back()->with('success', 'Product has been activated.');
    }

    public function suspend($id)
    {
       //dd($id);
        $cat= Category::find($id)->delete();
        //dd($cat);

        return redirect()->back()->with('success', 'Category has been suspended.');
    }

}
