<div>
    @php
           $links=[
          
       [
                   'title'=>'Dahboard',
                   'url'=>route('dashboard'),
                   'active'=>request()->routeIs('dashboard'),
                   'icon'=>'M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75'
       ],
       [
                   'title'=>'Servicios',
                   'url'=>route('service'),
                   'active'=>request()->routeIs('service'),
                   'icon'=>'M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13'
       ],
        [
                   'title'=>'Pacientes',
                   'url'=>route('patient'),
                   'active'=>request()->routeIs('patient'),
                   'icon'=>'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z'
       ],
       [
                   'title'=>'Ambientes',
                   'url'=>route('ambient'),
                   'active'=>request()->routeIs('ambient'),
                   'icon'=>'M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819'
       ],

       [
                   'title'=>'Atenciones',
                   'url'=>route('attention'),
                   'active'=>request()->routeIs('attention'),
                   'icon'=>'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z'
       ],
       [
                   'title'=>'Especialidad',
                   'url'=>route('specialty'),
                   'active'=>request()->routeIs('specialty'),
                   'icon'=>'M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9'
       ],
        [
                    'title'=>'Usuarios',
                    'url'=>route('user'),
                    'active'=>request()->routeIs('user'),
                    'icon'=>'M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z'
                    ],
                    [
                    'title'=>'Ventas',
                    'url'=>route('sale'),
                    'active'=>request()->routeIs('sale'),
                    'icon'=>'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z'
                    ],    
                    
                    [
                    'title'=>'Nueva Venta',
                    'url'=>route('sale.create'),
                    'active'=>request()->routeIs('sale.create'),
                    'icon'=>'M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z'
                    ],

                  ];
       @endphp
     <nav x-data="{ open: false }" class="  sm:pl-64 w-full  bg-[#0e1726] ">
       
         <div class="px-3 py-3 lg:px-5 lg:pl-3">
           <div class="flex items-center justify-between">
             <div class="flex items-center justify-start">
             
               <div class="sm:hidden" >
                  <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                   <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                       <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                       <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                   </svg>
                  </button>
               </div>
 
              
               <div class="hidden lg:block lg:pl-3.5">
                 <label for="topbar-search" class="sr-only">Search</label>
                 <div class="relative mt-1 lg:w-96">
                   <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                     <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                   </div>
                   <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                 </div>
               </div>
             </div>
             <div class="flex items-center">
                
                
                 
               <div class="flex items-center ">
   
                   <!-- Settings Dropdown -->
                   <div class="ml-3 relative">
                       <x-jet-dropdown align="right" width="w-96">
                           <x-slot name="trigger">
                             <button type="button" class="p-2 text-white rounded-lg hover:text-[#0e1726] hover:bg-white dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                               <span class="sr-only">View notifications</span>
                               
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                           </button>
                           </x-slot>
   
                           <x-slot name="content">
                             <div class=" px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Notifications
                           </div>
                        
   
                               <x-jet-dropdown-link class=" border-b" >
                                 <div class="flex">
                                     <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png" alt="Jese image">
                                     
                                   
                                     <div class="w-full pl-3">
                                         <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"</div>
                                         <div class="text-xs font-medium text-primary-700 dark:text-primary-400">a few moments ago</div>
                                     </div>
                                 </div >
                               </x-jet-dropdown-link>
                               <x-jet-dropdown-link class="" >
                                 <div class="flex">
                                     <img class="rounded-full w-11 h-11" src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green.png" alt="Jese image">
                                     
                                   
                                     <div class="w-full pl-3">
                                         <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span>: "Hey, what's up? All set for the presentation?"</div>
                                         <div class="text-xs font-medium text-primary-700 dark:text-primary-400">a few moments ago</div>
                                     </div>
                                 </div >
                               </x-jet-dropdown-link>
                      
                             <a href="#" class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                               <div class="inline-flex items-center ">
                                 <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                 View all
                               </div>
                           </a>
                           </x-slot>
 
                       </x-jet-dropdown>
                   </div>
              </div>
                 <div class="flex items-center ">
   
                       <!-- Settings Dropdown -->
                       <div class="ml-3 relative">
                           <x-jet-dropdown align="right" width="w-48">
                               <x-slot name="trigger">
                                   @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                       <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                           <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                       </button>
                                   @else
                                       <span class="inline-flex rounded-md">
                                           <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                               {{ Auth::user()->name }}
       
                                               <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                               </svg>
                                           </button>
                                       </span>
                                   @endif
                               </x-slot>
       
                               <x-slot name="content">
                                   <!-- Account Management -->
                                   <div class="block px-4 py-2 text-xs text-gray-400">
                                       {{ __('Manage Account') }}
                                   </div>
       
                                   <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                       {{ __('Profile') }}
                                   </x-jet-dropdown-link>
       
                                   @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                       <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                           {{ __('API Tokens') }}
                                       </x-jet-dropdown-link>
                                   @endif
       
                                   <div class="border-t border-gray-100"></div>
       
                                   <!-- Authentication -->
                                   <form method="POST" action="{{ route('logout') }}" x-data>
                                       @csrf
       
                                       <x-jet-dropdown-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                                           {{ __('Log Out') }}
                                       </x-jet-dropdown-link>
                                   </form>
                               </x-slot>
                           </x-jet-dropdown>
                       </div>
                 </div>
                 
               </div>
 
 
           </div>
           
         </div>
 
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white">
                    <!-- Responsive Settings Options -->
                  
                     <div class="flex py-4 items-center px-4">
                         @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                             <div class="shrink-0 mr-3">
                                 <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                             </div>
                         @endif
       
                         <div>
                             <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                             <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                         </div>
                     </div>
                     <div class=" mb-2  border-t border-gray-200">
                  
                 </div>
                 <div class="pt-2 pb-3 px-3 space-y-1">
                     @foreach ($links as $item)
            
                     <a href="{{$item['url']}}" class="flex items-center p-2 text-base font-normal  {{$item['active'] ? 'text-white bg-gray-900':'text-gray-900 hover:bg-gray-100' }}  rounded-lg  ">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="{{$item['icon']}}" />
                       </svg>
                       
                         <span class="ml-3">{{$item['title']}}</span>
                     </a>
         
               @endforeach
                 </div>
       
              
             </div>
     
     </nav>
 
     
    
 
     <aside id="logo-sidebar" class="w-64  fixed pt-5   left-0 top-0 h-screen transition-transform -translate-x-full sm:translate-x-0  border-r border-gray-200 bg-white dark:bg-gray-800 dark:border-gray-700" >
         <div class="px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800 h-full">
           
             <a href="{{route('dashboard')}}" class="flex ml-5 md:mr-24">
               <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
               <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-black">CASH APP</span>
             </a>
           
             <div class="flex items-center space-x-4 p-2 my-3 rounded-lg border shadow-lg">
               <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
               <div class="font-medium dark:text-white">
                   <div>{{ Auth::user()->name }}</div>
                   <div class="text-sm text-gray-500 dark:text-gray-400">Rol: Administrador</div>
               </div>
             </div>
 
           <ul class="space-y-2">
             @foreach ($links as $item)
                 <li>
                   <a href="{{$item['url']}}" class="flex items-center p-2 text-base font-normal  {{$item['active'] ? 'text-white bg-gray-900':'text-gray-900 hover:bg-gray-100' }}  rounded-lg  ">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="{{$item['icon']}}" />
                     </svg>
                     
                       <span class="ml-3">{{$item['title']}}</span>
                   </a>
                 </li> 
             @endforeach
               
              {{--  <li>
                 <a href="{{route('admin.posts')}}" class="flex items-center p-2 text-base font-normal  {{ request()->routeIs('admin.posts') ? 'text-white bg-gray-900':'text-gray-900 hover:bg-gray-100' }}  rounded-lg  ">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                   </svg>
                   
                  
                    <span class="ml-3">Posts</span>
                 </a>
              </li> --}}
              {{--  <li>
                <button type="button" class="flex items-center w-full p-2 text-base font-normal  text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"   aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                      <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>E-commerce</span>
                      <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                      <li>
                         <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                      </li>
                      <li>
                         <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>
                      </li>
                      <li>
                         <a href="#" class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>
                      </li>
                </ul>
             </li> --}}
               
            </ul>
         </div>
     </aside>
 </div>