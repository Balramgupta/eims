@section('sidebar')
<!--aside open-->
<div class="app-sidebar app-sidebar2">
	<div class="app-sidebar__logo">
		<a class="header-brand" href="index.html">
			<img src="{{asset('admin/assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Covido logo">
			<img src="{{asset('admin/assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Covido logo">
			<img src="{{asset('admin/assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Covido logo">
			<img src="{{asset('admin/assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Covido logo">
		</a>
	</div>
</div>
<aside class="app-sidebar app-sidebar3">
	<ul class="side-menu">
		<li class="slide">
			<a class="side-menu__item" href="#">
			<i class="fas fa-tachometer-alt"></i>
			<span class="side-menu__label">Dashboard</span></a>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
			<i class="fab fa-chromecast"></i>
			<span class="side-menu__label">Class Management</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="{{route('admin.class.level')}}" class="slide-item"> Class level</a></li>
				<li><a href="{{route('admin.class.faculty')}}" class="slide-item"> Faculty</a></li>
				<li><a href="{{route('admin.class')}}" class="slide-item"> Add Class</a></li>
				<li><a href="{{route('admin.class.assign_section_class')}}" class="slide-item"> Assign Section to Class</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
			<i class="fas fa-users"></i>
			<span class="side-menu__label">Student Management</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="{{route('admin.student.add_student')}}" class="slide-item">Add/Import Student</a></li>
				<li><a href="{{route('admin.student.assign_section')}}" class="slide-item">Assign to section</a></li>
				<li><a href="{{route('admin.student.assign_roll')}}" class="slide-item">Assign Roll No</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
			<i class="fas fa-book"></i>
			<span class="side-menu__label">Subjects</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="{{route('admin.subject')}}" class="slide-item">Add Subject</a></li>
				<li><a href="{{route('admin.subject.assign_subject_class')}}" class="slide-item">Assign subjects to class</a></li>
			</ul>
		</li>
		<li class="slide">
			<a class="side-menu__item" data-toggle="slide" href="#">
			<i class="fas fa-paste"></i>
			<span class="side-menu__label">Exam Management</span><i class="angle fa fa-angle-right"></i></a>
			<ul class="slide-menu">
				<li><a href="{{route('admin.examination.term')}}" class="slide-item">Term Name</a></li>
				<li><a href="{{route('admin.examination.test')}}" class="slide-item">Test Name</a></li>
				<li><a href="{{route('admin.examination.test_admit_card')}}" class="slide-item">Test Admit Card</a></li>
				<li><a href="{{route('admin.examination.remark_list')}}" class="slide-item">Remarks List</a></li>
				<li><a href="{{route('admin.examination.term_remark')}}" class="slide-item">Term Remarks</a></li>
				<li><a href="{{route('admin.examination.grade_detail')}}" class="slide-item">Grade Detail</a></li>
				<li><a href="{{route('admin.examination.term_setting')}}" class="slide-item">Term Setting</a></li>
				<li><a href="{{route('admin.examination.test_setting')}}" class="slide-item">Test Setting</a></li>
				<li><a href="{{route('admin.examination.carry_term')}}" class="slide-item">Carry Term</a></li>
				<li><a href="{{route('admin.examination.test_to_term')}}" class="slide-item">Add Test to Term</a></li>
				<li><a href="{{route('admin.examination.test_carry_management')}}" class="slide-item">Test Carry Management</a></li>
				<li><a href="{{route('admin.examination.carry_annual_mark')}}" class="slide-item">Carry Annual Mark</a></li>
				<li><a href="{{route('admin.examination.deportment')}}" class="slide-item">Deportment</a></li>
				<li><a href="{{route('admin.examination.assign_deportment_class')}}" class="slide-item">Assign Deportment Class</a></li>
				<li><a href="#" class="slide-item">Term Marks Entry</a></li>
				<li><a href="#" class="slide-item">Test Mark Entry</a></li>
				<li><a href="#" class="slide-item">Grading System</a></li>
				<li><a href="#" class="slide-item">Letter Grade Code</a></li>
			</ul>
		</li>

		<li class="slide">
			<a class="side-menu__item" href="{{route('admin.school_profile')}}">
			<i class="fas fa-tachometer-alt"></i>
			<span class="side-menu__label">School Profile</span></a>
		</li>
		
	</ul>
	<div class="app-sidebar-help">
		<div class="dropdown text-center">
			<div class="help d-flex">
				<a href="#" class="nav-link p-0 help-dropdown" data-toggle="dropdown">
					<span class="font-weight-bold">Help Info</span> <i class="fa fa-angle-down ml-2"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-4">
					<div class="border-bottom pb-3">
						<h4 class="font-weight-bold">Help</h4>
						<a class="text-primary d-block" href="#">Knowledge base</a>
						<a class="text-primary d-block" href="#">Contact@info.com</a>
						<a class="text-primary d-block" href="#">88 8888 8888</a>
					</div>
					<div class="border-bottom pb-3 pt-3 mb-3">
						<p class="mb-1">Your Fax Number</p>
						<a class="font-weight-bold" href="#">88 8888 8888</a>
					</div>
					<a class="text-primary" href="#">Logout</a>
				</div>
				<div class="ml-auto">
					<a class="nav-link icon p-0" href="#">
						<svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path opacity=".3" d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z"></path><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z"></path></svg>
						<span class="pulse "></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</aside>
<!--aside closed-->
@endsection