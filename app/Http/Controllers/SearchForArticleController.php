<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourcesContentModel;
use App\SourcesModel;
use App\CategoryModel;

class SearchForArticleController extends Controller 
{
    //
    public function search_article(Request $request)
    {
    	$data = $request->all();
    	$user_search_input = explode(" ", $data['search-text']);
    	$qry_result = "";
    	foreach ($user_search_input as $key => $value) 
    	{
    		if($value<>" " and strlen($value) > 0)
    		{
    			$qry_result .= "article_text LIKE '%$value%' or ";
    		}
    	}
    	$qry_result=substr($qry_result,0,(strlen($qry_result)-3));
 
    	$search_result = SourcesContentModel::whereRaw($qry_result)->paginate(9);
        // dd($search_result);
    	// return response()->json($search_result);
        return view('view_search')->with('search_result',$search_result);
    }

    public function showSource_content(Request $request)
    {
        $source = $request->all();
        $result = "";
        $arrResult = [];
        $input = $request->all();

         switch($source['source'])
        {
            // case 'BBC':
            //     $result =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
            //                                 ->where('sources_content.source_id','=',SourcesModel::BBC)
            //                                 ->orderBy('sources_content.id','desc')->paginate(6);
                
            //     break;

            // case 'CNN':
            //     $result =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
            //                                 ->where('sources_content.source_id','=',SourcesModel::CNN)
            //                                 ->orderBy('sources_content.id','desc')->paginate(6);
            //     break;

            case 'eNCA':
                $result =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::ENCA)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                break;

            case 'TheSouthAfrican':
                $result =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::THESOUTHAFRICAN)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                
                break;

            case 'sowetan':
                $result =  SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::SOWETANLIVE)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                
                break;
            case 'Zalebs':
                $result = SourcesContentModel::join('sources','sources.id','=','sources_content.source_id')
                                            ->where('sources_content.source_id','=',SourcesModel::ZALEBS)
                                            ->orderBy('sources_content.id','desc')->paginate(6);


        }
        $arrResult['source_result'] =  $result;
        return view('choosen_source')->with('data',['source'=>$input['source'],'result'=> $result]);
    }
    
    public function showChoosen_source(Request $request)
    {
        $input = $request->all();
        return view('show_source');
    }
    public function searchCategory(Request $request)
    {
        $input = $request->all();
        $arrResult = [];

        switch ($input['source']) 
        {
            case 'News':
                $result = SourcesContentModel::orderBy('id','desc')->paginate(6);
                
                break;
            case 'Entertainment':
                $result = SourcesContentModel::join('category','category.id','=','sources_content.category')
                                            ->where('category.id','=',CategoryModel::ENTERTAINMENT)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
        
                break;

            case 'Business';
                $result = SourcesContentModel::join('category','category.id','=','sources_content.category')
                                            ->where('category.id','=',CategoryModel::BUSINESS)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                break;

            case 'Travel':
                $result = SourcesContentModel::join('category','category.id','=','sources_content.category')
                                            ->where('category.id','=',CategoryModel::TRAVEL)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                break;

            case 'Technology':
                $result = SourcesContentModel::join('category','category.id','=','sources_content.category')
                                            ->where('category.id','=',CategoryModel::TECHNOLOGY)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                break;

            case 'Sports':
                $result = SourcesContentModel::join('category','category.id','=','sources_content.category')
                                            ->where('category.id','=',CategoryModel::SPORTS)
                                            ->orderBy('sources_content.id','desc')->paginate(6);
                break;

        
        }

        $arrResult['category_result'] =  $result;
        // dd(['category'=>$input['page'],'result'=> $arrResult]);
        return view('category')->with('data',['category'=>$input['source'],'result'=> $result]);
    }
}
