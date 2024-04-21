<?php

namespace App\Http\Controllers;

use App\Models\Coupon_data;
use App\Models\Course;
use App\Models\Duration;
use App\Models\Preferred_duration;
use App\Models\Students_course;
use App\Models\Student_data;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct()
    {

        $this->routeName = 'home.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $durations = Duration::get();
        $courses = Course::limit(11)->get();
        return view('home.register', compact('durations', 'courses'));
    }
    public function index()
    {
        $durations = Duration::get();
        $courses = Course::limit(11)->get();
        return view('home.register', compact('durations', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'id_number' => $request->input('id_number'),
            // 'city' => $request->input('city'),
            'education' => $request->input('education'),
            // 'job' => $request->input('job'),
            'note' => $request->input('note'),
        ];

        $durations = $request->input('dur');
        $courses = $request->input('course');
        $randomCoupon = Coupon_data::where('coupon_status', 1)->inRandomOrder()->first();
        $phoneExtist = Coupon_data::with('student')->where('coupon_status', 2)->whereNotNull('student_id')->get();

        $count = 0;
        $idCount = 0;

        foreach ($phoneExtist as $extist) {

            $testing = $extist->student()->get();
            foreach ($testing as $xx) {
                if ($xx->mobile == $request->input('mobile')) {
                    $count = $count + 1;
                }

                if ($xx->id_number == $request->input('id_number')) {
                    $idCount = $idCount + 1;
                }

            }
        }

        if ($randomCoupon) {
            if ($count > 0) {
                return redirect()->back()->withInput()->with('flash_success', 'لديك خصم على هذا الرقم ابحث عن الكوبون !');
            }
            if ($idCount > 0) {
                return redirect()->back()->withInput()->with('flash_success', 'لديك خصم على هذا ال ID ابحث عن الكوبون !');
            }
             DB::transaction(function () use ($data, $durations, $courses, $randomCoupon, $request) {

                    $student = Student_data::create($data);
                    if ($durations) {
                        foreach ($durations as $dur) {
                            Preferred_duration::create([
                                'student_id' => $student->id,
                                'duration_id' => $dur,
                            ]);
                        }
                    }
                    if ($courses) {
                        foreach ($courses as $course) {
                            Students_course::create([
                                'student_id' => $student->id,
                                'course_id' => $course,
                            ]);
                        }
                    }

                    $coupon = [
                        'student_id' => $student->id,
                        'assign_date' => Carbon::parse(now()),
                        'coupon_status' => 2,

                    ];

                    $randomCoupon->update($coupon);
                });

                return view('home.cong', compact('randomCoupon'));
            
        } else {

            return redirect()->route($this->routeName . 'index')->with('flash_success', 'لايوجد كوبون خصم حاليا !');
        }
    }

    public function search()
    {
        $coupon = new Coupon_data();
        return view('home.search', compact('coupon'));
    }

    public function searchResult(Request $request)
    {
        $id_number = $request->input('id_number');
        $students = Student_data::where('id_number', $id_number)->get();
        foreach ($students as $student) {

            $coupon = Coupon_data::where('coupon_status', 2)->where('student_id', $student->id)->first();
            if ($coupon) {
                break;
            }
        }
        return view('home.result', compact('coupon'))->render();
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
        //
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
