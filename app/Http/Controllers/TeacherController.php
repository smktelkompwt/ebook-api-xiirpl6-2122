<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from teachers;
        $result = [
            "status" => "200",
            "message" => "Load data is success",
            "data" => Teacher::all()
        ];

        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Teacher::create([
            "name" => $request->name,
            "gender" => $request->gender,
            "date_of_birth" => $request->date_of_birth,
        ]);

        // sent email if env is production
        if (App::environment(['production'])) {
            Maill::("afdasdf","asfasdf");
        }

        return [
            "status" => "201",
            "message" => "Save data is success",
            "data" => $data
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Teacher::where("id", $id)->get();
        $data = Teacher::find($id);
        $statusCode = 200;
        if($data) {
            $result = [
                "status" => $statusCode,
                "message" => "Load data is success",
                "data" => $data
            ];

            return $result;
        }else{
            $statusCode = 404;
            $result = [
                "status" => "404",
                "message" => "Data not found"
            ];

            return response($result, $statusCode);
        }
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
        $data = Teacher::find($id);
        if($data) {
            $data->name = $request->name;
            if($request->gender) $data->gender = $request->gender;
            if($request->date_of_birth) $data->date_of_birth = $request->date_of_birth;
            $data->save();

            $result = [
                "status" => "204",
                "message" => "Update data is success"
            ];

            return $result;
        }else{
            $result = [
                "status" => "404",
                "message" => "Data not found"
            ];

            return $result;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::find($id);
        if($data) {
            $data->delete();

            $result = [
                "status" => "204",
                "message" => "Remove data is success"
            ];

            return $result;
        }else{
            $result = [
                "status" => "404",
                "message" => "Data not found"
            ];

            return $result;
        }
    }
}
