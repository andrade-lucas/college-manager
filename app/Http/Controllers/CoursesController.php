<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::query()
            ->paginate();

        return response()->json($courses);
    }
}
