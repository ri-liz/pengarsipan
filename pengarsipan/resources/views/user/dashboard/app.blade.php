<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
    @stack('link')
    <style>
        body {font-family: 'Inter', sans-serif;}
    </style>
    <title>@yield('title') - Sistem Pengarsipan</title>
</head>
<body class="bg-white text-black">
    <header class="flex items-center justify-between px-6">

        <div class="flex items-center space-x-3">
            <img alt="" class="w-12 h-12" height="48" src="{{asset("")}}images/logo.png" width="48"/>
            <div class="py-3">
                <p class="font-semibold text-sm">Sistem Informasi</p>
                <p class="font-semibold text-sm">Pengarsipan</p>
            </div>
        </div>

        <button class="flex items-center space-x-2 bg-sky-300 hover:bg-sky-400 text-sky-700 rounded-full px-4 py-2 shadow-md text-sm font-medium" data-bs-toggle="modal" data-bs-target="#logoutModal" type="button">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>

        {{-- modal logout --}}
        <div class="modal" id="logoutModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h1 class="font-bold text-black text-xl mb-10">Yakin ingin keluar?</h1>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="{{route('page.logout.sy')}}" class="btn btn-secondary">Ya</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal logout --}}

    </header>

    <main>
        <div class="mb-10 bg-[blue]">
            <div class="text-sm text-gray-600 py-4 pl-4 !text-white">
                @yield('breadcurb')
            </div>
        </div>
        <div class="px-3">
            @yield('content')
        </div>
    </main>
    
    @stack('script')
</body>
</html>