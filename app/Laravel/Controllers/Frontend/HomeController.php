<?php

namespace App\Laravel\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Laravel\Models\{Category, User,Music};
//Request
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\{Carbon, Str};
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
	protected $data;
	protected $per_page;
    public function __construct()
    {
        parent::__construct();

		$this->data['page_title'] = " :: Home";
		$this->per_page = env("DEFAULT_PER_PAGE",10);
    }
 
    public function index(PageRequest $request)
    {

		$this->data['keyword'] = Str::lower($request->get('keyword'));

		$first_record = Music::with('categ')->orderBy('created_at','ASC')->first();
		$start_date = $request->get('start_date',Carbon::now()->startOfMonth());
		if($first_record){
			$start_date = $request->get('start_date',$first_record->created_at->format("Y-m-d"));
		}

		$this->data['start_date'] = Carbon::parse($start_date)->format("Y-m-d");
		$this->data['end_date'] = Carbon::parse($request->get('end_date',Carbon::now()))->format("Y-m-d");

		$this->data['page_title'] = " - Record Data";

		$this->data['record'] = Music::with('categ')->where(function($query){
									if (strlen(	$this->data['keyword']) > 0) {
										return $query->whereRaw("UPPER(name) LIKE  UPPER('{$this->data['keyword']}%')");

										}
									})
									->where(DB::raw("DATE(created_at)"),'>=',$this->data['start_date'])
									->where(DB::raw("DATE(created_at)"),'<=',$this->data['end_date'])
									->paginate($this->per_page);

    $this->data['page_title'] = "Song List";

     return view('frontend.home.index',$this->data);
    }


	public function fetch_data_fromtable_music(PageRequest $request){
		$draw = intval($request->get("draw"));
        $start = intval($request->get("start"));
        $length = intval($request->get("length"));

		$this->data['record'] = Music::with('categ')->get();

        
        $data = array();

        foreach($this->data['record'] as $qlv) {

       
            $data[] = array(
				$qlv->title,
                $qlv->categ->title,
                $qlv->artist,
				$qlv->created_at->format("F d Y")
            );
        }

        $output = array(
             "draw" => $draw,
               "recordsTotal" => $this->data['record']->count(),
               "recordsFiltered" => $this->data['record']->count(),
               "data" => $data
          );
        echo json_encode($output);
        exit();
	}


	public function show(PageRequest $request , $id = null)
	{
		$this->data['record'] = Music::with('categ')->findOrFail($id);
		$this->data['categories'] = Category::all();
		$this->data['page_title'] = "Show List";
		return view('frontend.home.show',$this->data);
	}

	public function redirect()
    {
		//
        // if(Auth::check())
        // {
		// 	return redirect()->route('system.login');
        // }
		return redirect()->route('frontend.home.index');
        
    }
    
}