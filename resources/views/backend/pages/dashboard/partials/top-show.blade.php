
<!-- ============================================================== -->
<!-- Dashboard Page Top Data -->
<!-- ============================================================== -->
<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.admins.index') }}'">
                        <div>
                            <i class="mdi mdi-account font-20 text-muted"></i>
                            <p class="font-16 m-b-5">Total Admins</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right">{{ $count_admins }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.roles.index') }}'">
                        <div>
                            <i class="mdi mdi-account font-20 text-muted"></i>
                            <p class="font-16 m-b-5">Total Roles</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right">{{ $count_roles }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.categories.index') }}'">
                        <div>
                            <i class="mdi mdi-tune font-20  text-muted"></i>
                            <p class="font-16 m-b-5">Total Categories</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right">{{ $count_categories }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.pages.index') }}'">
                        <div>
                            <i class="mdi mdi-tune font-20 text-muted"></i>
                            <p class="font-16 m-b-5">Total Pages</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right">{{ $count_pages }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Column -->
     <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center pointer" onclick="location.href='{{ route('admin.blogs.index') }}'">
                        <div>
                            <i class="mdi mdi-tune font-20 text-muted"></i>
                            <p class="font-16 m-b-5">Total Blogs</p>
                        </div>
                        <div class="ml-auto">
                            <h1 class="font-light text-right"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Column -->
</div>
