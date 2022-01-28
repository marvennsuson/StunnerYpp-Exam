<?php

namespace App\Laravel\Controllers\System;
use Illuminate\Http\Request;

//Models
use App\Laravel\Models\{Music,Category};
use App\Laravel\Requests\PageRequest;
//Request
use App\Laravel\Requests\System\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class CategoryController extends Controller
{
	protected $data;
	protected $per_page;
    public function __construct()
    {
        parent::__construct();

		$this->data['page_title'] = " :: Category Management";
		$this->per_page = env("DEFAULT_PER_PAGE",10);
    }
 
    public function index(PageRequest $request)
    {

		$this->data['keyword'] = Str::lower($request->get('keyword'));

		$first_record = Category::orderBy('created_at','ASC')->first();
		$start_date = $request->get('start_date',Carbon::now()->startOfMonth());
		if($first_record){
			$start_date = $request->get('start_date',$first_record->created_at->format("Y-m-d"));
		}

		$this->data['start_date'] = Carbon::parse($start_date)->format("Y-m-d");
		$this->data['end_date'] = Carbon::parse($request->get('end_date',Carbon::now()))->format("Y-m-d");

		$this->data['page_title'] = " - Record Data";

		$this->data['record'] = Category::where(function($query){
									if (strlen($this->data['keyword']) > 0) {
										
											return $query->whereRaw("UPPER(title) LIKE  UPPER('{$this->data['keyword']}%')");
			
										}
									})
									->where(DB::raw("DATE(created_at)"),'>=',$this->data['start_date'])
									->where(DB::raw("DATE(created_at)"),'<=',$this->data['end_date'])
									->paginate($this->per_page);

    $this->data['page_title'] = "Category List";

     return view('system.category.index',$this->data);
    }

    public function create()
    {
        $this->data['page_title'] = "Create Song Category";
		$this->data['record'] = Category::all();
        return view('system.category.create',$this->data);
    }

    public function store(CategoryRequest $request)
    {
	// dd($request->all());exit;
        DB::beginTransaction();
		try{
			$category = new Category;
			$category->title = $request->get('title');
			$category->save();
			
	
			DB::commit();

			session()->flash('notification-message', "Category was successfully created.");
			session()->flash('notification-status', "success");
			return redirect()->route('system.category.index');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();

		}
    }

    public function edit(PageRequest $request , $id = null)
    {   

		$this->data['page_title'] = "Edit Record";
		$this->data['record'] = Category::findOrFail($id);

        return view('system.category.edit',$this->data);
   
    }

    public function update(CategoryRequest $request , $id = null)
    {
		// dd($request->all() ,$id);exit;
        DB::beginTransaction();
		try{
			$category =  Category::findOrFail($id);
            $category->title = $request->get('title');
			$category->status = $request->get('status');
			$category->save();
			
	
			DB::commit();

			session()->flash('notification-message', "Category was successfully Update.");
			session()->flash('notification-status', "success");
			return redirect()->route('system.category.index');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();
    

		}
    }

    public function delete(Request $request)
    {
  
		$id = Category::findOrfail($request->id);
		DB::beginTransaction();

		try{

			$id->delete();

			DB::commit();
			
			session()->flash('notification-status', "success");
			session()->flash('notification-message', "Record removed successfully.");
			return redirect()->route('system.category.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();
		}
    }
}