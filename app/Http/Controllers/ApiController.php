<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApiCall;

class ApiController extends Controller {

    public function getContactList(ApiCall $apiCall)
    {
        $response = $apiCall->getContactList()->getBody();

        $JSONarray=json_decode($response,true);

        return view('pages.contactlist')->with('response', $JSONarray);

    }

    public function getDriveFileList(ApiCall $apiCall)
    {
        $response = $apiCall->getDriveFileList()->getBody();

        $JSONarray=json_decode($response,true);

        return view('pages.drivefilelist')->with('response', $JSONarray);

    }

}
