
<!DOCTYPE html>
<html lang="en">


    {{-- Head --}}
    @include('ekuitas.head')

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    @include('ekuitas.sidebar')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

    <!-- Topbar -->
    @include('ekuitas.topbar')


     <!-- Begin Page Content -->
                <div class="container-fluid">

                   @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!-- Footer -->
    @include('ekuitas.footer')


        </div>
        <!-- End of Content Wrapper -->

    </div>


    <!-- Scroll to Top Button-->
    @include('ekuitas.button-topbar')
    <!-- Logout Modal-->
    @include('ekuitas.logout')

    {{-- Javascript --}}
    @include('ekuitas.javascript')

</body>

</html>
