<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{


    //function for both search and filter
    public function filter(Request $request) {
        $q = $request->q;
        $author = $request->author;
        $topic = $request->topic;
        $company = $request->company;
        $supervisor = $request->supervisor;
        $year = $request->year;
        $tags = $request->tags;

        $resources = Resource::search($q); 
        $resources = $resources->where('name','LIKE','%'.$author.'%');
        $resources = $resources->where('company','LIKE','%'.$company.'%');
        $resources = $resources->where('supervisor','LIKE','%'.$supervisor.'%');
        $resources = $resources->where('topic','LIKE','%'.$topic.'%'); 
        $resources = $resources->where('year','LIKE','%'.$year.'%');
        $resources = $resources->where('tags','LIKE','%'.$tags.'%');           
        

        $resources = $resources->latest()->paginate(5);             
        if(count($resources) > 0) {
            return view('filter', [
                'resources' => $resources,
                'q' => $q,
                'author' => $author,
                'company' => $company,
                'supervisor' => $supervisor,
                'topic' => $topic,
                'year' => $year,
                'tags' => $tags
            ]);
        }else {
             echo "there is nothing like that result";
        }
    }
}
