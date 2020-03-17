<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
//use App\summernote;
use App\Postnote;
use App\Post;
use App\Posts_replies;

class PostnoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Bangkok");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$postnote = new Postnote;
        $list = Postnote::paginate(5); //$postnote->user();
        
        $data['lists'] = $list;
        $data['title'] = 'Post Note';
        

        return view('post_note', $data);
    }


    public function store(Request $request)
    {   
        if($request->title !== NULL){
            $detail=$request->summernoteInput;
            
            $dom = new \domdocument();
            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
     
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
     
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                
                $data = base64_decode($data);
                $image_name= '/picture-summernote/'.time().$k.'.png';
                $path = public_path() . $image_name;
     
                file_put_contents($path, $data);
     
                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }
            $title = $request->title;
            $detail = $dom->savehtml();
            $by = Auth::user()->id;
            $postnote = new Postnote;
            $postnote->content = $detail;
            $postnote::create(['title'=>$title, 'content'=>$detail, 'user_id'=>$by]);
            //$postnote->save();
            //return view('post_note',compact('postnote'));

            return response()->json([
                'type' => 'success',
                'message' => 'Berhasil'
            ]);

        }else{
            $data['alert'] = 'data kosong';
            //return view('post_note', $data);
            return response()->json([
                'type' => 'error',
                'message' => 'Data Kosong'
            ]);
        }
    }

    public function note(Request $request)
    {   
        $validator = Validator::make($request->all(), [
                'status' => 'required|max:200'
        ]);

        if ($validator->fails()) {
            //$errors = $validator->errors();
            /*return response()->json([
                'type' =>'error',
                'message'=>$errors->first('status')]);*/
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }else{

            $content = $request->status;
            $post = new Post;
            $by = Auth::user()->id;

            if($post::create(['content'=>$content, 'user_id'=>$by]))
            {
                return redirect('/')->with(['status'=>'Berhasil']);
                //$request->session()->flash('status', 'Berhasil');
            }else{
                return redirect('/')->with(['status'=>'Gagal']);
                /*return response()->json([
                    'type' => 'error',
                    'message' => 'Gagal'
                ]);*/
            }

        }
    }

    public function replies(Request $request)
    {
        $id = $request->post_id;
        $content = $request->reply;
        $by = Auth::user()->id;
        $postsr = new Posts_replies;
        if($postsr::create(['content'=>$content,'user_id'=>$by,'posts_id'=>$id]))
        {
            return redirect('/')->with(['status'=>'Berhasil']);
        }else{
            return redirect('/')->with(['status'=>'Gagal']);
        }

    }
}
