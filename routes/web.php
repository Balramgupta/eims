<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\AssignSectionClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssignSectionController;
use App\Http\Controllers\AssignRollController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssignSubjectClassController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestAdmitCardController;
use App\Http\Controllers\RemarkListController;
use App\Http\Controllers\TermRemarkController;
use App\Http\Controllers\GradeDetailController;
use App\Http\Controllers\TermSettingController;
use App\Http\Controllers\TestSettingController;
use App\Http\Controllers\CarryTermController;
use App\Http\Controllers\TestToTermController;
use App\Http\Controllers\TestCarryManagementController;
use App\Http\Controllers\CarryAnnualMarkController;
use App\Http\Controllers\DeportmentController;
use App\Http\Controllers\AssignDeportmentClassController;


use App\Http\Controllers\SchoolProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Admin
Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->name('admin.dashboard');




Route::get('/get-faculty', [DefaultController::class, 'get_faculty'])->name('get-faculty');
Route::get('/get-class', [DefaultController::class, 'get_class'])->name('get-class');
Route::get('/get-section', [DefaultController::class, 'get_section'])->name('get-section'); 

// Class
Route::prefix('admin/class')->group(function(){
	// Level
	Route::get('/level/index', [LevelController::class, 'index'])->name('admin.class.level');
	Route::get('/level/create', [LevelController::class, 'create'])->name('admin.class.level.create');
	Route::post('/level/store', [LevelController::class, 'store'])->name('admin.class.level.store');
	Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('admin.class.level.edit');
	Route::put('/level/update/{id}', [LevelController::class, 'update'])->name('admin.class.level.update');
	Route::get('/level/destroy/{id}', [LevelController::class, 'destroy'])->name('admin.class.level.destroy');


	// Faculty
	Route::get('/faculty/index', [FacultyController::class, 'index'])->name('admin.class.faculty');
	Route::get('/faculty/create', [FacultyController::class, 'create'])->name('admin.class.faculty.create');
	Route::post('/faculty/store', [FacultyController::class, 'store'])->name('admin.class.faculty.store');
	Route::get('/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('admin.class.faculty.edit');
	Route::put('/faculty/update/{id}', [FacultyController::class, 'update'])->name('admin.class.faculty.update');
	Route::get('/faculty/destroy/{id}', [FacultyController::class, 'destroy'])->name('admin.class.faculty.destroy');

	// Student Class
	Route::get('/index', [StudentClassController::class, 'index'])->name('admin.class');
	Route::get('/create', [StudentClassController::class, 'create'])->name('admin.class.create');
	Route::post('/store', [StudentClassController::class, 'store'])->name('admin.class.store');
	Route::get('/edit/{id}', [StudentClassController::class, 'edit'])->name('admin.class.edit');
	Route::put('/update/{id}', [StudentClassController::class, 'update'])->name('admin.class.update');
	Route::get('/destroy/{id}', [StudentClassController::class, 'destroy'])->name('admin.class.destroy');

	// Assign Section Class
	Route::get('/assign_section_class/index', [AssignSectionClassController::class, 'index'])->name('admin.class.assign_section_class');
	Route::get('/assign_section_class/create', [AssignSectionClassController::class, 'create'])->name('admin.class.assign_section_class.create');
	Route::post('/assign_section_class/store', [AssignSectionClassController::class, 'store'])->name('admin.class.assign_section_class.store');
	Route::get('/assign_section_class/edit/{class_id}', [AssignSectionClassController::class, 'edit'])->name('admin.class.assign_section_class.edit');
	Route::put('/assign_section_class/update/{class_id}', [AssignSectionClassController::class, 'update'])->name('admin.class.assign_section_class.update');
	Route::get('/assign_section_class/detail/{class_id}', [AssignSectionClassController::class, 'detail'])->name('admin.class.assign_section_class.detail');
	Route::get('/assign_section_class/destroy/{class_id}', [AssignSectionClassController::class, 'destroy'])->name('admin.class.assign_section_class.destroy');

});


// Student
Route::prefix('admin/student')->group(function(){
	// Add Student
	Route::get('/add_student/index', [StudentController::class, 'index'])->name('admin.student.add_student');
	Route::get('/add_student/create', [StudentController::class, 'create'])->name('admin.student.add_student.create');
	Route::post('/add_student/store', [StudentController::class, 'store'])->name('admin.student.add_student.store');
	Route::get('/add_student/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.add_student.edit');
	Route::put('/add_student/update/{id}', [StudentController::class, 'update'])->name('admin.student.add_student.update');
	Route::get('/add_student/destroy/{id}', [StudentController::class, 'destroy'])->name('admin.student.add_student.destroy');

	// Assign Section
	Route::get('/assign_section/index', [AssignSectionController::class, 'index'])->name('admin.student.assign_section');
	Route::get('/assign_section/create', [AssignSectionController::class, 'create'])->name('admin.student.assign_section.create');
	Route::post('/assign_section/store', [AssignSectionController::class, 'store'])->name('admin.student.assign_section.store');
	Route::get('/assign_section/edit/{id}', [AssignSectionController::class, 'edit'])->name('admin.student.level.edit');
	Route::put('/assign_section/update/{id}', [AssignSectionController::class, 'update'])->name('admin.student.assign_section.update');
	Route::get('/assign_section/destroy/{id}', [AssignSectionController::class, 'destroy'])->name('admin.student.assign_section.destroy');

	// Assign Roll
	Route::get('/assign_roll/index', [AssignRollController::class, 'index'])->name('admin.student.assign_roll');
	Route::get('/assign_roll/get_student', [AssignRollController::class, 'getStudent'])->name('admin.student.assign_roll.get_student');
	Route::post('/assign_roll/store', [AssignRollController::class, 'store'])->name('admin.student.assign_roll.store');
});

// Subject
Route::prefix('admin/subject')->group(function(){
	// Add Subject
	Route::get('/index', [SubjectController::class, 'index'])->name('admin.subject');
	Route::get('/create', [SubjectController::class, 'create'])->name('admin.subject.create');
	Route::post('/store', [SubjectController::class, 'store'])->name('admin.subject.store');
	Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('admin.subject.edit');
	Route::put('/update/{id}', [SubjectController::class, 'update'])->name('admin.subject.update');
	Route::get('/destroy/{id}', [SubjectController::class, 'destroy'])->name('admin.subject.destroy');

	// Assign Subject to Class
	Route::get('/assign_subject_class/index', [AssignSubjectClassController::class, 'index'])->name('admin.subject.assign_subject_class');
	Route::get('/assign_subject_class/create', [AssignSubjectClassController::class, 'create'])->name('admin.subject.assign_subject_class.create');
	Route::post('/assign_subject_class/store', [AssignSubjectClassController::class, 'store'])->name('admin.subject.assign_subject_class.store');
	Route::get('/assign_subject_class/edit/{id}', [AssignSubjectClassController::class, 'edit'])->name('admin.subject.assign_subject_class.edit');
	Route::put('/assign_subject_class/update/{id}', [AssignSubjectClassController::class, 'update'])->name('admin.subject.assign_subject_class.update');
	Route::get('/assign_subject_class/destroy/{id}', [AssignSubjectClassController::class, 'destroy'])->name('admin.subject.assign_subject_class.destroy');
});

// Examination
Route::prefix('admin/examination')->group(function(){
	// Add Term
	Route::get('/term/index', [TermController::class, 'index'])->name('admin.examination.term');
	Route::get('/term/create', [TermController::class, 'create'])->name('admin.examination.term.create');
	Route::post('/term/store', [TermController::class, 'store'])->name('admin.examination.term.store');
	Route::get('/term/edit/{id}', [TermController::class, 'edit'])->name('admin.examination.term.edit');
	Route::put('/term/update/{id}', [TermController::class, 'update'])->name('admin.examination.term.update');
	Route::get('/term/destroy/{id}', [TermController::class, 'destroy'])->name('admin.examination.term.destroy');

	// Add Test
	Route::get('/test/index', [TestController::class, 'index'])->name('admin.examination.test');
	Route::get('/test/create', [TestController::class, 'create'])->name('admin.examination.test.create');
	Route::post('/test/store', [TestController::class, 'store'])->name('admin.examination.test.store');
	Route::get('/test/edit/{id}', [TestController::class, 'edit'])->name('admin.examination.test.edit');
	Route::put('/test/update/{id}', [TestController::class, 'update'])->name('admin.examination.test.update');
	Route::get('/test/destroy/{id}', [TestController::class, 'destroy'])->name('admin.examination.test.destroy');

	// Test Admit Card
	Route::get('/test_admit_card/index', [TestAdmitCardController::class, 'index'])->name('admin.examination.test_admit_card');
	Route::get('/test_admit_card/create', [TestAdmitCardController::class, 'create'])->name('admin.examination.test_admit_card.create');
	Route::post('/test_admit_card/store', [TestAdmitCardController::class, 'store'])->name('admin.examination.test_admit_card.store');
	Route::get('/test_admit_card/edit/{id}', [TestAdmitCardController::class, 'edit'])->name('admin.examination.test_admit_card.edit');
	Route::put('/test_admit_card/update/{id}', [TestAdmitCardController::class, 'update'])->name('admin.examination.test_admit_card.update');
	Route::get('/test_admit_card/destroy/{id}', [TestAdmitCardController::class, 'destroy'])->name('admin.examination.test_admit_card.destroy');

	// Remarks List
	Route::get('/remark_list/index', [RemarkListController::class, 'index'])->name('admin.examination.remark_list');
	Route::get('/remark_list/create', [RemarkListController::class, 'create'])->name('admin.examination.remark_list.create');
	Route::post('/remark_list/store', [RemarkListController::class, 'store'])->name('admin.examination.remark_list.store');
	Route::get('/remark_list/edit/{id}', [RemarkListController::class, 'edit'])->name('admin.examination.remark_list.edit');
	Route::put('/remark_list/update/{id}', [RemarkListController::class, 'update'])->name('admin.examination.remark_list.update');
	Route::get('/remark_list/destroy/{id}', [RemarkListController::class, 'destroy'])->name('admin.examination.remark_list.destroy');

	// Term Remarks
	Route::get('/term_remark/index', [TermRemarkController::class, 'index'])->name('admin.examination.term_remark');
	Route::get('/term_remark/create', [TermRemarkController::class, 'create'])->name('admin.examination.term_remark.create');
	Route::post('/term_remark/store', [TermRemarkController::class, 'store'])->name('admin.examination.term_remark.store');
	Route::get('/term_remark/edit/{id}', [TermRemarkController::class, 'edit'])->name('admin.examination.term_remark.edit');
	Route::put('/term_remark/update/{id}', [TermRemarkController::class, 'update'])->name('admin.examination.term_remark.update');
	Route::get('/term_remark/destroy/{id}', [TermRemarkController::class, 'destroy'])->name('admin.examination.term_remark.destroy');

	// Grade Detail
	Route::get('/grade_detail/index', [GradeDetailController::class, 'index'])->name('admin.examination.grade_detail');
	Route::get('/grade_detail/create', [GradeDetailController::class, 'create'])->name('admin.examination.grade_detail.create');
	Route::post('/grade_detail/store', [GradeDetailController::class, 'store'])->name('admin.examination.grade_detail.store');
	Route::get('/grade_detail/edit/{id}', [GradeDetailController::class, 'edit'])->name('admin.examination.grade_detail.edit');
	Route::put('/grade_detail/update/{id}', [GradeDetailController::class, 'update'])->name('admin.examination.grade_detail.update');
	Route::get('/grade_detail/destroy/{id}', [GradeDetailController::class, 'destroy'])->name('admin.examination.grade_detail.destroy');

	// Term Setting
	Route::get('/term_setting/index', [TermSettingController::class, 'index'])->name('admin.examination.term_setting');
	Route::get('/term_setting/create', [TermSettingController::class, 'create'])->name('admin.examination.term_setting.create');
	Route::post('/term_setting/store', [TermSettingController::class, 'store'])->name('admin.examination.term_setting.store');
	Route::get('/term_setting/edit/{id}', [TermSettingController::class, 'edit'])->name('admin.examination.term_setting.edit');
	Route::put('/term_setting/update/{id}', [TermSettingController::class, 'update'])->name('admin.examination.term_setting.update');
	Route::get('/term_setting/destroy/{id}', [TermSettingController::class, 'destroy'])->name('admin.examination.term_setting.destroy');

	// Test Setting
	Route::get('/test_setting/index', [TestSettingController::class, 'index'])->name('admin.examination.test_setting');
	Route::get('/test_setting/create', [TestSettingController::class, 'create'])->name('admin.examination.test_setting.create');
	Route::post('/test_setting/store', [TestSettingController::class, 'store'])->name('admin.examination.test_setting.store');
	Route::get('/test_setting/edit/{id}', [TestSettingController::class, 'edit'])->name('admin.examination.test_setting.edit');
	Route::put('/test_setting/update/{id}', [TestSettingController::class, 'update'])->name('admin.examination.test_setting.update');
	Route::get('/test_setting/destroy/{id}', [TestSettingController::class, 'destroy'])->name('admin.examination.test_setting.destroy');

	// Carry Term
	Route::get('/carry_term/index', [CarryTermController::class, 'index'])->name('admin.examination.carry_term');
	Route::get('/carry_term/create', [CarryTermController::class, 'create'])->name('admin.examination.carry_term.create');
	Route::post('/carry_term/store', [CarryTermController::class, 'store'])->name('admin.examination.carry_term.store');
	Route::get('/carry_term/edit/{id}', [CarryTermController::class, 'edit'])->name('admin.examination.carry_term.edit');
	Route::put('/carry_term/update/{id}', [CarryTermController::class, 'update'])->name('admin.examination.carry_term.update');
	Route::get('/carry_term/destroy/{id}', [CarryTermController::class, 'destroy'])->name('admin.examination.carry_term.destroy');

	// Add Test to Term
	Route::get('/test_to_term/index', [TestToTermController::class, 'index'])->name('admin.examination.test_to_term');
	Route::get('/test_to_term/create', [TestToTermController::class, 'create'])->name('admin.examination.test_to_term.create');
	Route::post('/test_to_term/store', [TestToTermController::class, 'store'])->name('admin.examination.test_to_term.store');
	Route::get('/test_to_term/edit/{id}', [TestToTermController::class, 'edit'])->name('admin.examination.test_to_term.edit');
	Route::put('/test_to_term/update/{id}', [TestToTermController::class, 'update'])->name('admin.examination.test_to_term.update');
	Route::get('/test_to_term/destroy/{id}', [TestToTermController::class, 'destroy'])->name('admin.examination.test_to_term.destroy');

	// Test Carry Management
	Route::get('/test_carry_management/index', [TestCarryManagementController::class, 'index'])->name('admin.examination.test_carry_management');
	Route::get('/test_carry_management/create', [TestCarryManagementController::class, 'create'])->name('admin.examination.test_carry_management.create');
	Route::post('/test_carry_management/store', [TestCarryManagementController::class, 'store'])->name('admin.examination.test_carry_management.store');
	Route::get('/test_carry_management/edit/{id}', [TestCarryManagementController::class, 'edit'])->name('admin.examination.test_carry_management.edit');
	Route::put('/test_carry_management/update/{id}', [TestCarryManagementController::class, 'update'])->name('admin.examination.test_carry_management.update');
	Route::get('/test_carry_management/destroy/{id}', [TestCarryManagementController::class, 'destroy'])->name('admin.examination.test_carry_management.destroy');

	// Carry Annual Mark
	Route::get('/carry_annual_mark/index', [CarryAnnualMarkController::class, 'index'])->name('admin.examination.carry_annual_mark');
	Route::get('/carry_annual_mark/create', [CarryAnnualMarkController::class, 'create'])->name('admin.examination.carry_annual_mark.create');
	Route::post('/carry_annual_mark/store', [CarryAnnualMarkController::class, 'store'])->name('admin.examination.carry_annual_mark.store');
	Route::get('/carry_annual_mark/edit/{id}', [CarryAnnualMarkController::class, 'edit'])->name('admin.examination.carry_annual_mark.edit');
	Route::put('/carry_annual_mark/update/{id}', [CarryAnnualMarkController::class, 'update'])->name('admin.examination.carry_annual_mark.update');
	Route::get('/carry_annual_mark/destroy/{id}', [CarryAnnualMarkController::class, 'destroy'])->name('admin.examination.carry_annual_mark.destroy');

	// Deportment
	Route::get('/deportment/index', [DeportmentController::class, 'index'])->name('admin.examination.deportment');
	Route::get('/deportment/create', [DeportmentController::class, 'create'])->name('admin.examination.deportment.create');
	Route::post('/deportment/store', [DeportmentController::class, 'store'])->name('admin.examination.deportment.store');
	Route::get('/deportment/edit/{id}', [DeportmentController::class, 'edit'])->name('admin.examination.deportment.edit');
	Route::put('/deportment/update/{id}', [DeportmentController::class, 'update'])->name('admin.examination.deportment.update');
	Route::get('/deportment/destroy/{id}', [DeportmentController::class, 'destroy'])->name('admin.examination.deportment.destroy');

	// Assign Deportment to Class
	Route::get('/assign_deportment_class/index', [AssignDeportmentClassController::class, 'index'])->name('admin.examination.assign_deportment_class');
	Route::get('/assign_deportment_class/create', [AssignDeportmentClassController::class, 'create'])->name('admin.examination.assign_deportment_class.create');
	Route::post('/assign_deportment_class/store', [AssignDeportmentClassController::class, 'store'])->name('admin.examination.assign_deportment_class.store');
	Route::get('/assign_deportment_class/edit/{id}', [AssignDeportmentClassController::class, 'edit'])->name('admin.examination.assign_deportment_class.edit');
	Route::put('/assign_deportment_class/update/{id}', [AssignDeportmentClassController::class, 'update'])->name('admin.examination.assign_deportment_class.update');
	Route::get('/assign_deportment_class/destroy/{id}', [AssignDeportmentClassController::class, 'destroy'])->name('admin.examination.assign_deportment_class.destroy');

});


// School Profile
Route::get('admin/school_profile/index', [SchoolProfileController::class, 'index'])->name('admin.school_profile');
Route::get('/school_profile/create', [SchoolProfileController::class, 'create'])->name('admin.school_profile.create');
Route::post('/school_profile/store', [SchoolProfileController::class, 'store'])->name('admin.school_profile.store');
Route::get('/school_profile/edit/{id}', [SchoolProfileController::class, 'edit'])->name('admin.school_profile.edit');
Route::put('/school_profile/update/{id}', [SchoolProfileController::class, 'update'])->name('admin.school_profile.update');
Route::get('/school_profile/destroy/{id}', [SchoolProfileController::class, 'destroy'])->name('admin.school_profile.destroy');


// Route::post('/getFaculty', [DefaultController::class, 'getFaculty']);