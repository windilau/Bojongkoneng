<?php

    namespace App\Http\Controllers;

    use App\Models\DataRT;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class DataRTController extends Controller
    {

        public function home()
        {
            $rt = dataRT::all();
            return view('bokoin.content.landingPage', compact('rt'));
        }
    
        public function index()
        {
            $rt = dataRT::all();
            return view('content.dashboard-data-rt', compact('rt'));
        }

        public function create()
        {
            return view('content.dashboard-data-rt-add');
        }

        public function store(Request $request)
        {
            $input = $request->all();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->move(public_path('image'), $filename);
                $input['image'] = $filename;
            }
            dataRT::create($input);
            return redirect('dashboard-data-rt');
        }

        public function edit($id)
        {
            $rt = dataRT::findOrFail($id);
            return view('content.dashboard-data-rt-edit',compact('rt'));
        }

        public function update(Request $request, $id)
        {
            $rt = dataRT::findOrFail($id);
            $input = $request->all();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . $file->getClientOriginalName();
                $path = $file->move(public_path('image'), $filename);
                $input['image'] = $filename;
            }
            $rt->update($input);
            return redirect('dashboard-data-rt');
        }

        public function destroy($id)
        {
            $rt = dataRT::findOrFail($id);
            if($rt->image){
                Storage::delete('public/image'. $rt->image);
            }
            $rt->delete();
            return redirect('dashboard-data-rt');
        }
    }