
<!-- Start code top header -->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="#!">
                <img src="{{url(\App\Models\Setting::find(13)->ar_value)}}" alt="logo" class="logo-default editedLogo" /> </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                   {{-- <li class="dropdown dropdown-user dropdown-dark add_notification">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username">
							<i class="fas fa-bell"></i> الإشعارات </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li><a href="#!"> إشعارات الدخول و التسجيل  </a></li>
                            <li><a href="#!">  يمكنك رؤية الإشعارات </a></li>

                        </ul>
                    </li>
                    <li class="dropdown dropdown-user dropdown-dark add_notification">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username">
							<i class="fas fa-comment"></i> الرسائل </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li><a href="#!"> إشعارات الدخول و التسجيل  </a></li>
                            <li><a href="#!">  يمكنك رؤية الإشعارات </a></li>

                        </ul>
                    </li>--}}
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <img alt="" style="width: 40px; height: 40px" class="img-circle" src="{{asset(Auth::user()->image)}}" > </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            {{--<li> تاريخ التسجيل <span> {{auth()->user()->created_at}} </span> </li>--}}
                            {{--<li> تاريخ الإنتهاء <span> 15 - 8 - 2020 </span> </li>--}}
                            {{--<li> المدة المتبقية <span> 10 أيام </span> </li>--}}
                            <li>
                                <a href="{{route('admins.edit',[Auth::id()])}}" class="btn btn-primary Btn_Logout btn_delet"><i class="icon-key"></i> تعديل حساب </a>
                            </li>
                            <li>
                                {!!Form::open(['method'=>'post','route'=>'adminlogout'])!!}

                                <button type=submit class="col-xs-12 btn btn-primary"><i class="icon-key"></i> تسجيل خروج </button>
                                {!! Form::close()!!}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div id="clockdate">
                            <div class="clockdate-wrapper">
                                <div id="clock"></div>
                            </div>
                        </div>
                        <table border="0" width="130" dir="rtl" class="text-center">
                            <tr>
                                <td>
                                    <script language="JavaScript">
                                        var fixd;
                                        function isGregLeapYear(year)
                                        {
                                            return year%4 == 0 && year%100 != 0 || year%400 == 0;
                                        }
                                        function gregToFixed(year, month, day)
                                        {
                                            var a = Math.floor((year - 1) / 4);
                                            var b = Math.floor((year - 1) / 100);
                                            var c = Math.floor((year - 1) / 400);
                                            var d = Math.floor((367 * month - 362) / 12);
                                            if (month <= 2)
                                                e = 0;
                                            else if (month > 2 && isGregLeapYear(year))
                                                e = -1;
                                            else
                                                e = -2;
                                            return 1 - 1 + 365 * (year - 1) + a - b + c + d + e + day;
                                        }
                                        function Hijri(year, month, day)
                                        {
                                            this.year = year;
                                            this.month = month;
                                            this.day = day;
                                            this.toFixed = hijriToFixed;
                                            this.toString = hijriToString;
                                        }
                                        function hijriToFixed()
                                        {
                                            return this.day + Math.ceil(29.5 * (this.month - 1)) + (this.year - 1) * 354 +
                                                Math.floor((3 + 11 * this.year) / 30) + 227015 - 1;
                                        }
                                        function hijriToString()
                                        {
                                            var months = new Array("محرم","صفر","ربيع أول","ربيع ثانى","جمادى أول","جمادى ثانى","رجب","شعبان","رمضان","شوال","ذو القعدة","ذو الحجة");
                                            return this.day + " " + months[this.month - 1]+ " " + this.year;
                                        }
                                        function fixedToHijri(f)
                                        {
                                            var i=new Hijri(1100, 1, 1);
                                            i.year = Math.floor((30 * (f - 227015) + 10646) / 10631);
                                            var i2=new Hijri(i.year, 1, 1);
                                            var m = Math.ceil((f - 29 - i2.toFixed()) / 29.5) + 1;
                                            i.month = Math.min(m, 12);
                                            i2.year = i.year;
                                            i2.month = i.month;
                                            i2.day = 1;
                                            i.day = f - i2.toFixed() +2;
                                            return i;
                                        }
                                        var tod=new Date();
                                        var weekday=new Array("الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت");
                                        var monthname=new Array("يناير","فبراير","مارس","إبريل","مايو","يونيو","يوليو","أغسطس","سبتمبر","أكتوبر","نوفمبر","ديسمبر");
                                        var y = tod.getFullYear();
                                        var m = tod.getMonth();
                                        var d = tod.getDate();
                                        var dow = tod.getDay();
                                        document.write(weekday[dow] + " " + d + " " + monthname[m] + " " + y);
                                        m++;
                                        fixd=gregToFixed(y, m, d);
                                        var h=new Hijri(1421, 11, 28);
                                        h = fixedToHijri(fixd);
                                        document.write(" م <br> " + h.toString() + "هـ");
                                    </script>
                                    <script>
                                        <!-- Clock Code -->
                                        var dayarray=new Array("","","","","","","")
                                        var montharray=new Array("","","","","","","","","","","","")
                                        function getthedate(){
                                            var mydate=new Date()
                                            var year=mydate.getYear()
                                            if (year < 1000)
                                                year+=1900
                                            var day=mydate.getDay()
                                            var month=mydate.getMonth()
                                            var daym=mydate.getDate()
                                            if (daym<10)
                                                daym="0"+daym
                                            var hours=mydate.getHours()
                                            var minutes=mydate.getMinutes()
                                            var seconds=mydate.getSeconds()
                                            var dn="H:i"
                                            if (hours>=12)
                                                dn="مساءً"
                                            else
                                                dn="صباحاً"
                                            if (hours>12){
                                                hours=hours-12
                                            }
                                            if (hours==0)
                                                hours=12
                                            if (minutes<=9)
                                                minutes="0"+minutes
                                            if (seconds<=9)
                                                seconds="0"+seconds
                                            var cdate="<small><font color='000000' face='Times New Roman'>"+hours+":"+minutes+":"+seconds+" "+dn+"</font></small>"
                                            if (document.all)
                                                document.all.clock.innerHTML=cdate
                                            else if (document.getElementById)
                                                document.getElementById("clock").innerHTML=cdate
                                            else
                                                document.write(cdate)
                                        }
                                        if (!document.all&&!document.getElementById)
                                            getthedate()
                                        function goforit(){
                                            if (document.all||document.getElementById)
                                                setInterval("getthedate()",1000)
                                        }
                                    </script>
                                    <span id="clock">
                                        <body onLoad="goforit()"></body>
										</span></td>
                            </tr>
                        </table>

            </td>
            </tr>
            </table>
            </li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- End code top header -->
