 @php
     $user = auth()->user();
     $messages = App\Models\Message::all();
 @endphp

 <header class="top-header">
     <nav class="navbar navbar-expand gap-3">
         <div class="mobile-toggle-icon fs-3">
             <i class="bi bi-list"></i>
         </div>

         <div class="d-none d-lg-flex justify-content-between w-100 align-items-center">
             <div>
                 <a href="{{ url('/') }}" target="_blank">Back to Homepage <i class='bx bxs-right-top-arrow-circle'></i></a>
             </div>
             <div class="top-navbar-right">
                 <ul class="navbar-nav align-items-center">
                     <li>
                         <b>{{ now()->format('D, d M, Y h:i: A') }}</b>
                     </li>

                     <li class="nav-item dropdown dropdown-large">
                         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                             <div class="messages">
                                 @if ($messages->count())
                                     <span class="notify-badge">{{ $messages->count() }}</span>
                                 @endif
                                 <i class="bi bi-chat-right-fill"></i>
                             </div>
                         </a>
                         <div class="dropdown-menu dropdown-menu-end p-0">
                             <div class="p-2 border-bottom m-2">
                                 <h5 class="h5 mb-0">Messages</h5>
                             </div>
                             <div class="header-message-list p-2">
                                 @forelse ($messages as $message)
                                     <a class="dropdown-item" href="#">
                                         <div class="d-flex align-items-center">
                                             <img src="{{ $user->urlOf('avater') }}" alt="" class="rounded-circle" width="50"
                                                  height="50">
                                             <div class="ms-3 flex-grow-1">
                                                 <h6 class="mb-0 dropdown-msg-user"> {{ $message->sender_email }} <span
                                                           class="msg-time float-end text-secondary">{{ $message->created_at->diffForHumans() }}</span>
                                                 </h6>
                                                 <small
                                                        class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">{{ Str::limit($message->text, 20, '...') }}</small>
                                             </div>
                                         </div>
                                     </a>
                                 @empty
                                     <div class="text-center text-muted">No Messages Found</div>
                                 @endforelse
                             </div>
                             <div class="p-2">
                                 {{-- @if ($messages->count()) --}}
                                 <div>
                                     <hr class="dropdown-divider">
                                 </div>
                                 <a class="dropdown-item" href="{{ route('accounts.messages.index') }}">
                                     <div class="text-center">View All Messages</div>
                                 </a>
                                 {{-- @endif --}}
                             </div>
                         </div>
                     </li>
                     {{-- <li class="nav-item dropdown dropdown-large">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                         <div class="notifications">
                             <span class="notify-badge">8</span>
                             <i class="bi bi-bell-fill"></i>
                         </div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end p-0">
                         <div class="p-2 border-bottom m-2">
                             <h5 class="h5 mb-0">Notifications</h5>
                         </div>
                         <div class="header-notifications-list p-2">
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-primary text-primary"><i
                                            class="bi bi-basket2-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">New Orders <span
                                                   class="msg-time float-end text-secondary">1 m</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You
                                             have recived new orders</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-purple text-purple"><i class="bi bi-people-fill"></i>
                                     </div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">New Customers <span
                                                   class="msg-time float-end text-secondary">7 m</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5
                                             new user registered</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-success text-success"><i
                                            class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">24 PDF File <span
                                                   class="msg-time float-end text-secondary">2 h</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                             pdf files generated</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-orange text-orange"><i
                                            class="bi bi-collection-play-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">Time Response <span
                                                   class="msg-time float-end text-secondary">3 h</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1
                                             min avarage time response</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-info text-info"><i class="bi bi-cursor-fill"></i>
                                     </div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">New Product Approved <span
                                                   class="msg-time float-end text-secondary">1 d</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your
                                             new product has approved</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-pink text-pink"><i class="bi bi-gift-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">New Comments <span
                                                   class="msg-time float-end text-secondary">2 w</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                             customer comments recived</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-warning text-warning"><i
                                            class="bi bi-droplet-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">New 24 authors<span
                                                   class="msg-time float-end text-secondary">1 m</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24
                                             new authors joined last week</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-primary text-primary"><i class="bi bi-mic-fill"></i>
                                     </div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span
                                                   class="msg-time float-end text-secondary">7 m</span></h6>
                                         <small
                                                class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully
                                             shipped your item</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-success text-success"><i
                                            class="bi bi-lightbulb-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span
                                                   class="msg-time float-end text-secondary">2 h</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45%
                                             less alerts last 4 weeks</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-info text-info"><i
                                            class="bi bi-bookmark-heart-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span
                                                   class="msg-time float-end text-secondary">2 w</span></h6>
                                         <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                             4 user registartions</small>
                                     </div>
                                 </div>
                             </a>
                             <a class="dropdown-item" href="#">
                                 <div class="d-flex align-items-center">
                                     <div class="notification-box bg-light-bronze text-bronze"><i
                                            class="bi bi-briefcase-fill"></i></div>
                                     <div class="ms-3 flex-grow-1">
                                         <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span
                                                   class="msg-time float-end text-secondary">1 mo</span></h6>
                                         <small
                                                class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully
                                             uploaded all files</small>
                                     </div>
                                 </div>
                             </a>
                         </div>
                         <div class="p-2">
                             <div>
                                 <hr class="dropdown-divider">
                             </div>
                             <a class="dropdown-item" href="#">
                                 <div class="text-center">View All Notifications</div>
                             </a>
                         </div>
                     </div>
                 </li> --}}
                     <li class="nav-item dropdown dropdown-user-setting">
                         <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                             <div class="user-setting d-flex align-items-center">
                                 <img src="{{ $user->urlOf('avater') }}" class="user-img" alt="">
                             </div>
                         </a>
                         <ul class="dropdown-menu dropdown-menu-end">
                             <li>
                                 <a class="dropdown-item" href="#">
                                     <div class="d-flex align-items-center">
                                         <img src="{{ $user->urlOf('avater') ?? asset('assets/dashboard/images/no-image.png') }}"
                                              alt="" class="rounded-circle" width="54" height="54">
                                         <div class="ms-3">
                                             <h6 class="mb-0 dropdown-user-name">{{ $user->name }}</h6>
                                             <small class="mb-0 dropdown-user-designation text-secondary">
                                                 @hasrole('Super Admin')
                                                     Super Admin
                                                 @else
                                                     Basic User
                                                 @endhasrole
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li>
                                 <a class="dropdown-item" href="{{ route('accounts.users.show', auth()->id()) }}">
                                     <div class="d-flex align-items-center">
                                         <div class=""><i class="bi bi-person-fill"></i></div>
                                         <div class="ms-3"><span>Profile</span></div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <a class="dropdown-item" href="#">
                                     <div class="d-flex align-items-center">
                                         <div class=""><i class="bi bi-gear-fill"></i></div>
                                         <div class="ms-3"><span>Setting</span></div>
                                     </div>
                                 </a>
                             </li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li>
                                 <a class="dropdown-item" type="button" onclick="$('#logout-form').submit()">
                                     <div class="d-flex align-items-center">
                                         <div class=""><i class="bi bi-lock-fill"></i></div>
                                         <div class="ms-3"><span>Logout</span></div>
                                     </div>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
 </header>
