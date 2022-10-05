<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamEventController;
use App\Http\Controllers\StudentNoteController;
use App\Http\Controllers\StudentAnswerController;
use App\Http\Controllers\StudentAbsenceController;
use App\Http\Controllers\StudentPaymentController;
//use App\Http\Middleware\AdminAuthenticated;
//use App\Http\Middleware\TeacherAuthenticated;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/loginpage', [AuthController::class, 'index'])->name("login");
// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');
});

Route::get('/', function () {
    return view('homepage');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/search', [StudentController::class, 'search'])->name('search');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::prefix('/student_notes')->group(function () {
            Route::get('/', [StudentNoteController::class, 'index'])->name('student.notes');
            Route::post('/reply', [StudentNoteController::class, 'store'])->name('student.notes.store');
            Route::get('/delete/{id}', [StudentNoteController::class, 'destroy'])->name('student.notes.delete');
        });



        Route::prefix('/student')->group(function () {
            Route::get('/', [StudentController::class, 'getStudents'])->name('student.list');
            Route::get('/register', [StudentController::class, 'register'])->name('student.register');
            Route::get('/filter', [StudentController::class, 'filterStudents'])->name('filter.student');
            Route::get('/{id}', [StudentController::class, 'index'])->name('student.details');
            Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
            Route::get('/update_student/{id}', [StudentController::class, 'updateStudent'])->name('student.update_form');
            Route::post('/store', [StudentController::class, 'store'])->name('student.store');
            Route::get('/delete/{id}', [StudentController::class, 'destroy']);
        });

        Route::prefix('/student_absence')->group(function () {

            Route::get('/', [StudentAbsenceController::class, 'index'])->name('absences.list');
            Route::get('/show/{id}', [StudentAbsenceController::class, 'show'])->name('absences.show');
            Route::post('/store/{id}', [StudentAbsenceController::class, 'store'])->name('absences.store');
            Route::post('/delete/{id}', [StudentAbsenceController::class, 'destroy']);
            Route::get('/add/{id}', [StudentAbsenceController::class, 'create'])->name('absences.create');
        });

        Route::prefix('/student_payment')->group(function () {
            Route::get('/', [StudentPaymentController::class, 'index'])->name('student.payment');
            Route::post('/update/{id}', [StudentPaymentController::class, 'update'])->name('student_payment.update');
            Route::get('/create/{id}', [StudentPaymentController::class, 'create'])->name('student_payment.create');
            Route::get('/details/{id}', [StudentPaymentController::class, 'show'])->name('student_payment.show');
        });

        Route::prefix('/teacher')->group(function () {

            Route::get('/', [TeacherController::class, 'getTeachers'])->name('teacher.list');
            Route::get('/register', [TeacherController::class, 'register'])->name('teacher.register');
            Route::get('/{id}', [TeacherController::class, 'index'])->name('teacher.details');
            Route::post('/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
            Route::get('/update_teacher/{id}', [TeacherController::class, 'updateTeacher'])->name('teacher.update_form');
            Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
            Route::get('/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
        });

        Route::prefix('/course')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('course.list');
            Route::get('/add', [CourseController::class, 'add'])->name('course.add');
            Route::post('/store', [CourseController::class, 'store'])->name('course.store');
            Route::get('/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');
        });

        Route::prefix('/classroom')->group(function () {
            Route::get('/', [ClassroomController::class, 'index'])->name('classroom.list');
            Route::get('/create', [ClassroomController::class, 'create'])->name('classroom.create');
            Route::post('/store', [ClassroomController::class, 'store'])->name('classroom.store');
            Route::get('/delete/{id}', [ClassroomController::class, 'destroy'])->name('classroom.delete');
            Route::post('/update/{id}', [ClassroomController::class, 'update']);

            Route::prefix('/weekly_schedule')->group(function () {
                Route::get('/{id}/create/{day}', [ScheduleController::class, 'create'])->name('schedule.create');
                Route::post('/store', [ScheduleController::class, 'store'])->name('schedule.store');
                Route::get('/list', [ScheduleController::class, 'index'])->name('schedule.list');
                Route::get('/details/{id}', [ScheduleController::class, 'show'])->name('schedule.details');
            });
        });

        Route::prefix('/event')->group(function () {
            Route::get('/exam_event', [ExamEventController::class, 'index'])->name('events');
            Route::post('/exam_event/create', [ExamEventController::class, 'create']);
            Route::post('/exam_event/update', [ExamEventController::class, 'update']);
            Route::post('/exam_event/delete', [ExamEventController::class, 'destroy']);
        });
    });
});
Route::middleware(['student'])->group(function () {
    Route::prefix('student')->group(function () {
        Route::get('/', [StudentController::class, 'homepage'])->name('student.profile');
        Route::get('/details', [StudentController::class, 'studentDetails'])->name('student.ProfileDetails');
        Route::get('/ContactUs', [StudentController::class, 'sendComplaint'])->name('student.contactUs');
        Route::post('/sendComplaint', [StudentController::class, 'submitComplaint'])->name('student.submitComplaint');
        Route::get('/Replies', [StudentController::class, 'showReplies'])->name('student.replies');
        Route::get('/deletReply', [StudentController::class, 'deleteReply'])->name('student.reply.delete');
        Route::get('/courses', [CourseController::class, 'studentCourses'])->name('student.courses');
        Route::get('/schedule', [ScheduleController::class, 'studentSchdule'])->name('student.schedule');
        Route::post('/add_mark', [MarkController::class, 'store'])->name('mark.store');

        Route::prefix('/exam')->group(function () {
            Route::get('/new_exams', [ExamController::class, 'show'])->name('student.new_exam');
            Route::get('/finished_exams', [ExamController::class, 'showFinishedExams'])->name('student.finished_exam');
            Route::get('/make_exam/{id}', [ExamController::class, 'makeExam'])->name('student.make_exam');
            Route::post('/store', [StudentAnswerController::class, 'store'])->name('student.submit_exam');
        });

        Route::prefix('/homework')->group(function () {
            Route::get('/finished', [HomeworkController::class, 'finishedHomeworks'])->name('student.finished_homeworks');
            Route::get('/new', [HomeworkController::class, 'newHomework'])->name('student.new_homeworks');
            Route::post('/store', [HomeworkAnswerController::class, 'store'])->name('student.homework.store');
        });
    });
});

Route::middleware(['teacher'])->group(function () {
    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'homepage'])->name('teacher.profile');
        Route::get('/schedule', [ScheduleController::class, 'teacherSchdule'])->name('teacher.schedule');

        Route::prefix('/exam')->group(function () {
            Route::get('/create', [ExamController::class, 'create'])->name('exam.create');
            Route::post('/store', [ExamController::class, 'store'])->name('exam.store');
            Route::post('/delete/{id}', [ExamController::class, 'destroy']);
            Route::post('/store_answer/{id}', [ExamAnswerController::class, 'store']);
            Route::post('/delete_answer/{id}', [ExamAnswerController::class, 'destory']);
            Route::post('/store_question/{id}', [ExamQuestionController::class, 'store']);
            Route::post('/delete_question/{id}', [ExamQuestionController::class, 'destroy']);
            Route::get('/correct-exam', [ExamController::class, 'correct_exam'])->name('exam.correct-exam');
            Route::get('/finished-exams', [ExamController::class, 'finished_exam'])->name('exam.finished-exam');
            Route::get('/view-finished-exams', [ExamController::class, 'view_finished_exam'])->name('exam.view-finished-exam');
            Route::post('/submitExamMarks', [ExamController::class, 'submitExamMarks'])->name('exam.submit-exam-marks');
        });
        Route::prefix('/homework')->group(function () {
            Route::get('/create', [HomeworkController::class, 'create'])->name('homework.create');
            Route::get('/correct-homework', [HomeworkController::class, 'correct_homework'])->name('homework.correct-homework');
            Route::post('/store', [HomeworkController::class, 'store'])->name('homework.store');
            Route::get('/view-homework', [HomeworkController::class, 'view_homework'])->name('homework.view_homework');
        });

        Route::prefix('/mark')->group(function () {
            Route::get('/file-import', [MarkController::class, 'importView'])->name('import-view');
            Route::post('/import', [MarkController::class, 'import'])->name('import');
            Route::get('/export_homework_marks', [MarkController::class, 'exportHWMarks'])->name('export-hw-marks');
            Route::get('/export_exam_marks', [MarkController::class, 'exportExamMarks'])->name('export-exam-marks');
        });
    });
});
Route::middleware(['parent'])->group(function () {
    Route::prefix('parent')->group(function () {
        Route::get('/', [ParentsController::class, 'index'])->name('parentProfile');
    });
});
