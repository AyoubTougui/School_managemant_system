<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ sprintf("%02d", $numclass) }}</span>
                <span class="leading-tight">Classes</span>
            </h3>
        </div>
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 mx-0 sm:mx-6 my-4 sm:my-0 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ sprintf("%02d", $numsubj) }}</span>
                <span class="leading-tight">Subjects</span>
            </h3>
        </div>
        <div class="w-full bg-gray-200 text-center border border-gray-300 px-8 py-6 rounded">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl">{{ ($numstud) ?? 0 }}</span>
                <span class="leading-tight">Students</span>
            </h3>
        </div>
    </div>
</div>

<div class="flex items-center justify-between mb-6 mt-6">
    <div>
        <h2 class="text-gray-700 uppercase font-bold">Planning</h2>
    </div>
</div>
<div class="mt-8 bg-white rounded border-b-4 border-gray-300">
    <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3"></div>
        <div class="w-2/12 px-4 py-3">8:00/10:00</div>
        <div class="w-2/12 px-4 py-3">10:00/12:00</div>
        <div class="w-1/12 px-4 py-3"></div>
        <div class="w-2/12 px-4 py-3">14:00/16:00</div>
        <div class="w-2/12 px-4 py-3">16:00/18:00</div>
    </div>
    <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Monday <br> <br> <br> <br> </div>
        @if($m8)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $m8]) }}"> 
                    Subject : {{$m8->Subjectname($m8->subject_id)}} <br>Class : {{$m8->CLassName($m8->class_id)}} <br>Group : {{$m8->GroupName($m8->group_id)}} <br>Room : {{$m8->Roomname($m8->room_id)}}  
                </a> 
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($m10)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $m10]) }}">
                    Subject : {{$m10->Subjectname($m10->subject_id)}} <br>Class : {{$m10->CLassName($m10->class_id)}} <br>Group : {{$m10->GroupName($m10->group_id)}}  <br>Room : {{$m10->Roomname($m10->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        <div class="w-1/12 px-4 py-3"></div>
        @if($m14)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $m14]) }}">
                    Subject : {{$m14->Subjectname($m14->subject_id)}}  <br>Class : {{$m14->CLassName($m14->class_id)}} <br>Group : {{$m14->GroupName($m14->group_id)}}  <br>Room : {{$m14->Roomname($m14->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($m16)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $m16]) }}">
                    Subject : {{$m16->Subjectname($m16->subject_id)}} <br>Class : {{$m16->CLassName($m16->class_id)}} <br>Group : {{$m16->GroupName($m16->group_id)}}  <br>Room : {{$m16->Roomname($m16->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Tuesday <br> <br> <br> <br> </div>
        @if($t8)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $t8]) }}">
                    Subject : {{$t8->Subjectname($t8->subject_id)}} <br>Class : {{$t8->CLassName($t8->class_id)}} <br>Group : {{$t8->GroupName($t8->group_id)}}  <br>Room : {{$t8->Roomname($t8->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($t10)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $t10]) }}">
                    Subject : {{$t10->Subjectname($t10->subject_id)}} <br>Class : {{$t10->CLassName($t10->class_id)}} <br>Group : {{$t10->GroupName($t10->group_id)}}  <br>Room : {{$t10->Roomname($t10->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        <div class="w-1/12 px-4 py-3"></div>
        @if($t14)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $t14]) }}">
                    Subject : {{$t14->Subjectname($t14->subject_id)}} <br>Class : {{$t14->CLassName($t14->class_id)}} <br>Group : {{$t14->GroupName($t14->group_id)}}  <br>Room : {{$t14->Roomname($t14->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($t16)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $t16]) }}">
                    Subject : {{$t16->Subjectname($t16->subject_id)}} <br>Class : {{$t16->CLassName($t16->class_id)}} <br>Group : {{$t16->GroupName($t16->group_id)}}  <br>Room : {{$t16->Roomname($t16->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Wednesday <br> <br> <br> <br> </div>
        @if($w8)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $w8]) }}">
                    Subject : {{$w8->Subjectname($w8->subject_id)}} <br>Class : {{$w8->CLassName($w8->class_id)}} <br>Group : {{$w8->GroupName($w8->group_id)}}  <br>Room : {{$w8->Roomname($w8->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($w10)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $w10]) }}">
                    Subject : {{$w10->Subjectname($w10->subject_id)}} <br>Class : {{$w10->CLassName($w10->class_id)}} <br>Group : {{$w10->GroupName($w10->group_id)}}  <br>Room : {{$w10->Roomname($w10->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        <div class="w-1/12 px-4 py-3"></div>
        @if($w14)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $w14]) }}">
                    Subject : {{$w14->Subjectname($w14->subject_id)}} <br>Class : {{$w14->CLassName($w14->class_id)}} <br>Group : {{$w14->GroupName($w14->group_id)}}  <br>Room : {{$w14->Roomname($w14->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($w16)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $w16]) }}">
                    Subject : {{$w16->Subjectname($w16->subject_id)}} <br>Class : {{$w16->CLassName($w16->class_id)}} <br>Group : {{$w16->GroupName($w16->group_id)}}  <br>Room : {{$w16->Roomname($w16->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Thursday <br> <br> <br> <br> </div>
        @if($th8)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $th8]) }}">
                    Subject : {{$th8->Subjectname($th8->subject_id)}} <br>Class : {{$th8->CLassName($th8->class_id)}} <br>Group : {{$th8->GroupName($th8->group_id)}}  <br>Room : {{$th8->Roomname($th8->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($th10)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $th10]) }}">
                    Subject : {{$th10->Subjectname($th10->subject_id)}} <br>Class : {{$th10->CLassName($th10->class_id)}} <br>Group : {{$th10->GroupName($th10->group_id)}}  <br>Room : {{$th10->Roomname($th10->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        <div class="w-1/12 px-4 py-3"></div>
        @if($th14)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $th14]) }}">
                    Subject : {{$th14->Subjectname($th14->subject_id)}} <br>Class : {{$th14->CLassName($th14->class_id)}} <br>Group : {{$th14->GroupName($th14->group_id)}}  <br>Room : {{$th14->Roomname($th14->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($th16)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $th16]) }}">
                    Subject : {{$th16->Subjectname($th16->subject_id)}} <br>Class : {{$th16->CLassName($th16->class_id)}} <br>Group : {{$th16->GroupName($th16->group_id)}}  <br>Room : {{$th16->Roomname($th16->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-wrap items-center  text-sm font-semibold  rounded-tl rounded-tr">
        <div class="w-2/12 px-4 py-3 bg-gray-300 text-gray-600 uppercase">Friday <br> <br> <br> <br> </div>
        @if($f8)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $f8]) }}">
                    Subject : {{$f8->Subjectname($f8->subject_id)}} <br>Class : {{$f8->CLassName($f8->class_id)}} <br>Group : {{$f8->GroupName($f8->group_id)}}  <br>Room : {{$f8->Roomname($f8->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($f10)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $f10]) }}">
                    Subject : {{$f10->Subjectname($f10->subject_id)}} <br>Class : {{$f10->CLassName($f10->class_id)}} <br>Group : {{$f10->GroupName($f10->group_id)}}  <br>Room : {{$f10->Roomname($f10->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        <div class="w-1/12 px-4 py-3"></div>
        @if($f14)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $f14]) }}">
                    Subject : {{$f14->Subjectname($f14->subject_id)}} <br>Class : {{$f14->CLassName($f14->class_id)}} <br>Group : {{$f14->GroupName($f14->group_id)}}  <br>Room : {{$f14->Roomname($f14->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
        @if($f16)
            <div class="w-2/12 px-4 py-3">
                <a href="{{ route('attendance.create',['id'=> $f16]) }}">
                    Subject : {{$f16->Subjectname($f16->subject_id)}} <br>Class : {{$f16->CLassName($f16->class_id)}} <br>Group : {{$f16->GroupName($f16->group_id)}}  <br>Room : {{$f16->Roomname($f16->room_id)}}     
                </a>
            </div>
        @else
            <div class="w-2/12 px-4 py-3">
                <div class="flex flex-wrap items-center">
                    <p class="text-gray-700">Not set</p>
                </div>
            </div>
        @endif
    </div>        
</div>