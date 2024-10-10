<?php

namespace App\Http\Controllers\Api;

use App\Models\Post; // Make sure this refers to your Course model if necessary
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{    
    /**
     * Display a listing of the courses.
     *
     * @return PostResource
     */
    public function index()
    {
        // Get courses
        $courses = Post::latest()->paginate(5); // Replace Post with Course if needed

        // Return collection of courses as a resource
        return new PostResource(true, 'List Data Courses', $courses);
    }
    
    /**
     * Store a newly created course.
     *
     * @param  Request $request
     * @return PostResource
     */
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'id_course'        => 'required|integer',
            'title_course'     => 'required|string',
            'about_course'     => 'required|string',
            'is_premium'       => 'required|boolean',
            'level_course'     => 'required|string',
            'price_course'     => 'nullable|numeric',
            'teacher'          => 'nullable|string',
            'duration_course'  => 'nullable|string',
            'module'           => 'nullable|string',
            'language_course'  => 'nullable|string',
            'date_start'       => 'nullable|date',
            'date_end'         => 'nullable|date'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create course
        $course = Post::create([ // Replace Post with Course if needed
            'id_course'        => $request->id_course,
            'title_course'     => $request->title_course,
            'about_course'     => $request->about_course,
            'is_premium'       => $request->is_premium,
            'level_course'     => $request->level_course,
            'price_course'     => $request->price_course,
            'teacher'          => $request->teacher,
            'duration_course'  => $request->duration_course,
            'module'           => $request->module,
            'language_course'  => $request->language_course,
            'date_start'       => $request->date_start,
            'date_end'         => $request->date_end,
        ]);

        // Return response
        return new PostResource(true, 'Data Course Berhasil Ditambahkan!', $course);
    }

    /**
     * Display the specified course.
     *
     * @param  Post $course
     * @return PostResource
     */
    public function show(Post $course) // Replace Post with Course if needed
    {
        // Return single course as a resource
        return new PostResource(true, 'Data Course Ditemukan!', $course);
    }
    
    /**
     * Update the specified course.
     *
     * @param  Request $request
     * @param  Post $course
     * @return PostResource
     */
    public function update(Request $request, Post $course) // Replace Post with Course if needed
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'title_course'     => 'required|string',
            'about_course'     => 'required|string',
            'is_premium'       => 'required|boolean',
            'level_course'     => 'required|string',
            'price_course'     => 'nullable|numeric',
            'teacher'          => 'nullable|string',
            'duration_course'  => 'nullable|string',
            'module'           => 'nullable|string',
            'language_course'  => 'nullable|string',
            'date_start'       => 'nullable|date',
            'date_end'         => 'nullable|date'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update course
        $course->update([
            'title_course'     => $request->title_course,
            'about_course'     => $request->about_course,
            'is_premium'       => $request->is_premium,
            'level_course'     => $request->level_course,
            'price_course'     => $request->price_course,
            'teacher'          => $request->teacher,
            'duration_course'  => $request->duration_course,
            'module'           => $request->module,
            'language_course'  => $request->language_course,
            'date_start'       => $request->date_start,
            'date_end'         => $request->date_end,
        ]);

        // Return response
        return new PostResource(true, 'Data Course Berhasil Diubah!', $course);
    }
    
    /**
     * Remove the specified course.
     *
     * @param  Post $course
     * @return PostResource
     */
    public function destroy(Post $course) // Replace Post with Course if needed
    {
        // Delete course
        $course->delete();

        // Return response
        return new PostResource(true, 'Data Course Berhasil Dihapus!', null);
    }
}
