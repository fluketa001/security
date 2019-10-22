

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                      <div class="navbar nav_title" style="border: 0;">
                        <a href="/home/{{$id->id ?? ''}}" class="site_title"><i class="fa fa-home"></i> <span>{{$id->name ?? ''}}</span></a>
                      </div>

                      <div class="clearfix"></div>

                      <!-- menu profile quick info -->
                      <div class="profile clearfix">
                        <div class="profile_pic">
                          <img src="{{ asset("images/$user->picture") }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{$user->name}}</h2>
                        </div>
                      </div>
                      <!-- /menu profile quick info -->

                      <br />

                      <!-- sidebar menu -->
                      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                          <h3>General</h3>
                          <ul class="nav side-menu">
                            <li><a href="/home/{{$id->id ?? ''}}"><i class="fa fa-home"></i> หน้าหลัก </a></li>
                            <li><a href="#"><i class="fa fa-search"></i> ค้นหาข้อมูล <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                <li><a href="#">ทะเบียนรถ</a></li>
                                <li><a href="#">ชื่อ - นามสกุล</a></li>
                                <li><a href="#">หมายเลขยูนิต/บ้านเลขที่</a></li>
                              </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> ประวัติการจอด </a></li>
                          </ul>
                        </div>

                        <div class="menu_section">
                          <h3>CHANGE</h3>
                          <ul class="nav side-menu">
                            <li><a href="{{ url('/select-project') }}"><i class="fa fa-clone"></i>เปลี่ยนโครงการ</a></li>
                          </ul>
                        </div>

                        @php
                            if($user->status == "admin"){
                                echo "
                                <div class='menu_section'>
                                    <h3>MANAGE</h3>
                                    <ul class='nav side-menu'>
                                    <li><a href='/user'><i class='fa fa-users'></i>ผู้ใช้งาน</a></li>
                                        <li><a href='/enterprise'><i class='fa fa-home'></i>โครงการ</a></li>
                                    </ul>
                                </div>
                                ";
                            }
                        @endphp

                      </div>
                      <!-- /sidebar menu -->

                      <!-- /menu footer buttons -->
                      {{--<div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                      </div> --}}
                      <!-- /menu footer buttons -->
                    </div>
                  </div>

                  <!-- top navigation -->
                  <div class="top_nav">
                    <div class="nav_menu">
                      <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                          <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <img src="{{ asset("images/$user->picture") }}" alt="">{{$user->name}}
                              <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                              <li><a href="javascript:;"> ข้อมูลส่วนตัว</a></li>
                              {{--
                                <li>
                                <a href="javascript:;">
                                  <span class="badge bg-red pull-right">50%</span>
                                  <span>Settings</span>
                                </a>
                              </li>
                              <li><a href="javascript:;">Help</a></li>
                              --}}
                              <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> ออกจากระบบ</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              </li>
                            </ul>
                          </li>

                    {{--
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-envelope-o"></i>
                              <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                              <li>
                                <a>
                                  <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a>
                                  <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a>
                                  <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li>
                                <a>
                                  <span class="image"><img src="{{ asset('images/img.jpg') }}" alt="Profile Image" /></span>
                                  <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                  </span>
                                </a>
                              </li>
                              <li>
                                <div class="text-center">
                                  <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                                </div>
                              </li>
                            </ul>
                          </li>
                          --}}
                        </ul>
                      </nav>
                    </div>
                  </div>
                  <!-- /top navigation -->
