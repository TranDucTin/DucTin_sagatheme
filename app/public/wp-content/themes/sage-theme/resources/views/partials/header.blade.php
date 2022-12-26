<header id="header" class="module header w-full h-25 top-0 left-0 fixed z-200 border-b-1 bg-sky-800"
    data-module="header">
    <div class="cus-container">
        <nav class="p-5 bg-sky-800 shadow xl:flex xl:items-center xl:justify-around">
            <div class="flex justify-around items-center xl:w-auto md:w-4/5 xl:mx-0 md:mx-auto">
                <div class="lg:w-full relative">
                    <a id="header-logo" class="navbar-brand header-logo py-5 inline-block align-middle"
                        href="{!! App::getLogo()['href'] !!}">
                        <img src="{!! App::getLogo()['url'] !!}" alt="{!! App::getLogo()['alt'] !!}" class="w-full">
                    </a>
                </div>
                <div class="xl:hidden block">
                    <button class="navbar-toggler hamburger-menu p-4 mt-0 cursor-pointer" type="button"
                        data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar block bg-white relative ml-auto w-16 h-2"></span>
                        <span class="icon-bar block bg-white relative ml-auto w-16 h-2 mt-3"></span>
                        <span class="icon-bar block bg-white relative ml-auto w-16 h-2 mt-3"></span>
                        <span class="sr-only">Open Menu</span>
                    </button>
                </div>
            </div>
            <ul id="main-menu" data-module="menu" class="list-none py-32 px-40 xl:flex xl:items-center m-0 z-[-1] xl:z-auto xl:static absolute bg-sky-800 w-full left-0 xl:w-[auto]
        xl:py-0 xl:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500" id="collapse">
                <li class="menu-item px-9 my-9 uppercase text-white">
                    <a class="py-9 no-underline hover:text-blue-100" href="#">ABOUT US</a>
                </li>
                <li class="menu-item px-9 my-9 uppercase text-white">
                    <a class="py-9 no-underline hover:text-blue-100" href="#">LEADERSHIP</a>
                </li>
                <li class="menu-item px-9 my-9 uppercase text-white">
                    <a class="py-9 no-underline hover:text-blue-100" href="#">CAREES</a>
                </li>

                <li class="active menu-item px-9 my-9 uppercase text-white">
                    <a class="py-9 no-underline hover:text-blue-100" href="#">CONTACT US</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
