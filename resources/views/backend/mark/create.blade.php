@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Create Mark</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('mark.index') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>  

        <div class="w-full mt-8 bg-white rounded">
            <form action="{{ route('mark.create') }}" method="get" class="w-full px-6  pt-6 form" >
                @csrf
                <div class="md:flex w-full md:items-center mb-6" >
                    <div class="md:w-1/6 mr-4">
                            <select name="class_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dynamic" id="grid-state"
                            data-dependent="group_id">
                                <option value="">--Select Class--</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="md:w-1/6 mr-4">
                            <select name="group_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 group_id" id="grid-state">
                               
                            </select>
                    </div>

                    <div class="md:w-1/6 mr-4">
                            <select name="exam_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 exam_id" id="grid-state">
                               
                            </select>
                    </div>
                </div>
            </form>  
            @if(isset($students))
            
            <div class="w-7/12 px-6 pb-6">
                <div class="flex items-center bg-gray-200 rounded-tl rounded-tr">
                    <div class="w-4/12 text-left text-gray-600 py-2 px-4 font-semibold">Name</div>
                    <div class="w-9/12 text-right text-gray-600 py-2 px-4 font-semibold">Mark</div>
                </div>
                <form action="{{ route('mark.store') }}" method="post">
                   <!-- foreach -->
                   @foreach($students as $student)
                        <div class="flex items-center justify-between border border-gray-200">
                            @csrf
                            <div class="w-4/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">{{ $student->name }}</div>
                            <div class="w-3/12 text-sm text-right py-2 px-4 flex items-center justify-end">
                                <input name="marks[{{$student->id}}]" step="0.01" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="number" value="{{ old('mark') }}" autocomplete="off">
                            </div>
                            
                        </div>
                    @endforeach  
                    <input type="hidden" name="class" value="{{ $_REQUEST['class_id'] }}">
                    <input type="hidden" name="group" value="{{ $_REQUEST['group_id'] }}">
                    <input type="hidden" name="exam" value="{{ $_REQUEST['exam_id'] }}">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- end foreach -->
                    <div class="mt-6">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>  
            @else
            <ol class="text-gray-700" style="padding-left:50px;padding-bottom:20px;">
                <li><h2 >Pick a class </h2></li>
                <li><h2 >Pick a group </h2></li>
                <li><h2 >Pick an exam </h2></li>
            </ol>
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
                       subject = data['subjects'];
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
                   url:"{{ route('mark.fetchGroup')}}",
                   datatype:'json',
                   data:{id:id},
                   success:function(data){
                       exam = data['exam'];
                       txt3 = '<option value="">--Select Exam--</option>';
                       for(var i=0;i<exam.length;i++)
                       {
                           txt3+='<option value="'+exam[i].id+'">'+exam[i].name+'</option>';
                       }
                       $('.exam_id').html(txt3);
                   },
                   error:function(data){
                       alert(data.responseJSON);
                   }
               });
        });

        $('.exam_id').change(function () {
            $(".form").submit();
        })

    });
</script>
@endpush