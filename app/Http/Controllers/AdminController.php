<?php

namespace App\Http\Controllers;

use App\Models\Coupon_data;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Coupon_data $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'Admin.';
        $this->routeName = 'admin.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Coupon_data::with('student')->whereNotNull('student_id')->orderBy("assign_date", "Desc")->get();
        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Coupon_data::with('student')->whereNotNull('student_id')->get();
        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon_data::where('id', $id)->first();

        $data = [
            'coupon_status' => $request->input('coupon_status'),
            'adminNotes' => $request->input('adminNotes'),

        ];

        if ($request->input('coupon_status') != 4) {

            $data['coupon_status'] = 2;
        }
        $coupon->update($data);
        return redirect()->back()->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
