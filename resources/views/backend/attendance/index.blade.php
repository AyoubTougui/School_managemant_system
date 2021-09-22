@extends('layouts.app')



@section('content')
    <div class="create">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Attendance</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('home') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="w-full mt-8 bg-white rounded">
            <form action="{{ route('attendance.DisplayAtt') }}" method="GET" class="md:flex md:items-center md:justify-between px-6 py-6 pb-0 " >

                <div class="md:flex w-full md:items-center mb-6 text-gray-700 uppercase font-bold">
                    <div class="md:w-1/6  mr-4">
                        <select name="class_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dynamic" id="grid-state">
                            <option value="">--Select Class--</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>              
                    <div class="md:w-1/6  mr-4">
                        <select name="group_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 group_id" id="grid-state">

                        </select>
                    </div>
                    <div class="md:w-1/6  mr-4">
                        <select name="date" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 date_id" id="grid-state">

                        </select>
                    </div>
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Generate</button>
                </div>
            </form>
            @if(isset($dates))
            <div class="w-full px-6 py-6">
                <div class="tabs">
                    @foreach($dates as $date)
                        <div class="tab bg-gray-200">
                            <input type="checkbox" id="chck{{$date->attendance_date}}" class="checkbox">
                            <label class="tab-label bg-gray-300 text-gray-600 border-l-4 border-gray-600" for="chck{{$date->attendance_date}}">{{$date->attendance_date}}</label>
                            <div class="tab-content">
                                <div class="w-full ">
                                    <div class="flex items-center justify-between bg-gray-200 rounded-tl rounded-tr">
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Date</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Time</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Teacher</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Subject</div>
                                        <div class="w-3/12 text-right text-gray-600 py-2 px-4 font-semibold">Attendance</div>
                                    </div>
                                    @foreach($attendance as $a)
                                        @if($date->attendance_date == $a->attendance_date)
                                            <div class="flex items-center justify-between border border-gray-200">
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->student->user->name }}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->time }}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->TeacherName($a->planning->teacher_id)}}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->Subjectname($a->planning->subject_id)}}</div>
                                                <div class="w-3/12 text-xs text-right text-gray-600 py-2 px-4 font-semibold"> 
                                                    @if ($a->attendance_status==1)
                                                        <span class="bg-green-600 text-white px-2 py-1 rounded">Present</span>
                                                    @else
                                                        <span class="bg-red-600 text-white px-2 py-1 rounded">Absent</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>  
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>  
            @elseif(isset($times))
            <div class="w-full px-6 py-6">
                <div class="tabs">
                    @foreach($times as $time)
                        <div class="tab bg-gray-200">
                            <input type="checkbox" id="chck{{$time}}" class="checkbox">
                            <label class="tab-label bg-gray-300 text-gray-600 border-l-4 border-gray-600" for="chck{{$time}}">{{$time}}</label>
                            <div class="tab-content">
                                <div class="w-full "> 
                                    <div class="flex items-center justify-between bg-gray-200 rounded-tl rounded-tr">
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Date</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Time</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Teacher</div>
                                        <div class="w-3/12 text-left text-gray-600 py-2 px-4 font-semibold">Subject</div>
                                        <div class="w-3/12 text-right text-gray-600 py-2 px-4 font-semibold">Attendance</div>
                                    </div>
                                    @foreach($attendance as $a)
                                        @if($a->planning->time == $time)
                                            <div class="flex items-center justify-between border border-gray-200">
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->student->user->name }}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->time }}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->TeacherName($a->planning->teacher_id)}}</div>
                                                <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $a->planning->Subjectname($a->planning->subject_id)}}</div>
                                                <div class="w-3/12 text-xs text-right text-gray-600 py-2 px-4 font-semibold"> 
                                                    @if ($a->attendance_status==1)
                                                        <span class="bg-green-600 text-white px-2 py-1 rounded">Present</span>
                                                    @else
                                                        <span class="bg-red-600 text-white px-2 py-1 rounded">Absent</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>  
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>  
            @else
                <h2 class="text-gray-700" style="padding:50px;">Pick a class and a group</h2>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.dynamic').change(function () {
            var id=$(this).val();
            $.ajaxSetup({
               headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               }
            });
            $.ajax({
                type:'POST',
                url:"{{ route('mark.fetch')}}",
                datatype:'json',
                data:{id:id},
                success:function(data){
                    group = data['group'];
                    txt = '<option value="">--Select Group--</option>';
                    for(var i=0;i<group.length;i++)
                    {
                        txt+='<option value="'+group[i].id+'">'+group[i].name+'</option>';
                    }
                    $('.group_id').html(txt);
                },
                error:function(data){
                    alert(data.responseJSON);
                }
            });  
        });
        $('.group_id').change(function () {
            var id=$(this).val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:"{{route('attendance.FetchDate')}}",
                datatype:'json',
                data:{id:id},
                success:function(data){
                    date = data['date'];
                    txt = '<option value="">--Select Date--</option>';
                    for(var i=0;i<date.length;i++)
                    {
                        txt+='<option value="'+date[i].attendance_date+'">'+date[i].attendance_date+'</option>';
                    }
                    $('.date_id').html(txt);
                },
                error:function(data){
                    alert(data.responseJSON);
                }
            });  
        });
        
    });
</script>
@endpush