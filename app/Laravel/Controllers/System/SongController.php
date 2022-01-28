<?php

namespace App\Laravel\Controllers\System;
use Illuminate\Http\Request;


//Models
use App\Laravel\Models\{Music,Category};

//Request
use App\Laravel\Requests\System\SongRequest;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class SongController extends Controller
{
	protected $data;
	protected $per_page;

	public function __construct(){
		parent::__construct();
		// array_merge($this->data, parent::get_data());

		$this->data['page_title'] = " :: Song Management";
		$this->per_page = env("DEFAULT_PER_PAGE",10);
	}
    public function index(PageRequest $request)
    {

		$this->data['keyword'] = Str::lower($request->get('keyword'));

		$first_record = Music::orderBy('created_at','ASC')->first();
		$start_date = $request->get('start_date',Carbon::now()->startOfMonth());
		if($first_record){
			$start_date = $request->get('start_date',$first_record->created_at->format("Y-m-d"));
		}

		$this->data['start_date'] = Carbon::parse($start_date)->format("Y-m-d");
		$this->data['end_date'] = Carbon::parse($request->get('end_date',Carbon::now()))->format("Y-m-d");



		$this->data['record'] = Music::where(function($query){
										if(strlen($this->data['keyword']) > 0){
											return $query->whereRaw("UPPER(title) LIKE  UPPER('{$this->data['keyword']}%')")
														->orWhereRaw("UPPER(artist) LIKE  UPPER('{$this->data['keyword']}%')");
										}
									})
									->where(DB::raw("DATE(created_at)"),'>=',$this->data['start_date'])
									->where(DB::raw("DATE(created_at)"),'<=',$this->data['end_date'])
									->paginate($this->per_page);


    $this->data['page_title'] = "Music List";
     return view('system.song.index',$this->data);
    }

    public function create()
    {
		$this->data['categories'] = Category::all();
		// dd(	$this->data['categories']);exit;
        $this->data['page_title'] = "Create Song";
        return view('system.song.create',$this->data);
    }

    public function store(SongRequest $request)
    {
        DB::beginTransaction();
		try{
			$songs = new Music;
			$songs->categ_id = $request->get('categ_id');
			$songs->user_id =  Auth::user()->id;
			$songs->title =  $request->get('title');
			$songs->artist =  $request->get('artist');
			$songs->lyrics =  $request->get('lyrics');
     
			$songs->save();
			
	
			DB::commit();

			session()->flash('notification-message', "Song  was successfully created.");
			session()->flash('notification-status', "success");
			return redirect()->route('system.song.index');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();

		}
    }

    public function edit(PageRequest $request , $id = null)
    {   
		$this->data['categories'] = Category::all();
    
		$this->data['page_title'] = "Edit Record";
		$this->data['record'] = Music::findOrFail($id);

        return view('system.song.edit',$this->data);
   
    }

    public function update(SongRequest $request , $id = null)
    {

		// dd($request->all() , $id);exit;
        DB::beginTransaction();
		try{
			$clinic =  Music::findOrFail($id);
            
			$clinic->categ_id = $request->get('categ_id');
			$clinic->user_id = Auth::user()->id;
			$clinic->title =  $request->get('title');
			$clinic->artist =  $request->get('artist');
			$clinic->lyrics =  $request->get('lyrics');
            $clinic->status = $request->get('status');
			$clinic->save();
			
	
			DB::commit();

			session()->flash('notification-message', "Song was successfully Update.");
			session()->flash('notification-status', "success");
		
			return redirect()->route('system.song.index');

		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
		}
    }

    public function delete(Request $request)
    {
	
		$id = Music::findOrfail($request->id);
		DB::beginTransaction();

		try{
         
			$id->delete();

			DB::commit();
			
			session()->flash('notification-status', "success");
			session()->flash('notification-message', "Record removed successfully.");
			return redirect()->route('system.song.index');
		}catch(\Exception $e){
			DB::rollback();
			session()->flash('notification-status', "failed");
			session()->flash('notification-message', "Server Error: Code #{$e->getMessage()}");
			return redirect()->back();
		}
    }
}