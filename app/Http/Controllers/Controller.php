<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Redirect;

use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
    	return view('layouts.index');
    }

    public function form_submit(Request $request)
    {
    	if ($request->ajax())
    	{
    		if ($request->isMethod('POST'))
    		{
    			$productName = $request->input('productName');
    			$quantity = $request->input('quantityInStock');
    			$price = $request->input('pricePerItem');

    			$xml = new \DOMDocument();
				$xml_album = $xml->createElement("Products");
				$xml_track = $xml->createElement("Items");
				$xml_album->appendChild( $xml_track );
				$xml->appendChild( $xml_album );

				$xml->save( public_path() . "/xml/data.xml");

    			return \Response::json(array('success' => $productName));
    		}
    	}
    }

}
